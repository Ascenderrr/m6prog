<?php
require_once __DIR__ . '/../database.php';

class Ontvanger
{
    public int $Bericht_idbericht;
    public int $User_idUser;
 
    public function __construct(int $Bericht_idbericht, int $User_idUser)
    {
        $this->Bericht_idbericht = $Bericht_idbericht;
        $this->User_idUser = $User_idUser;
    }

    // haal alle ontvanger op

    public static function GetAllOntvangers(): array 
    {
        global $connection;
        $ontvangers = [];
        
        $query = "SELECT Bericht_idbericht, User_idUser FROM Ontvanger";
        $result = $connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ontvangers[] = new Ontvanger(
                    (int)$row['Bericht_idbericht'],
                    (int)$row['User_idUser']
                );
            }
        }
        
        return $ontvangers;
    }

    // Haal ontvangers op voor een specifiek bericht

    public static function GetOntvangersByBerichtId(int $berichtId): array 
    {
        global $connection;
        $ontvangers = [];
        
        $stmt = $connection->prepare("SELECT Bericht_idbericht, User_idUser FROM Ontvanger WHERE Bericht_idbericht = ?");
        $stmt->bind_param("i", $berichtId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ontvangers[] = new Ontvanger(
                    (int)$row['Bericht_idbericht'],
                    (int)$row['User_idUser']
                );
            }
        }
        
        return $ontvangers;
    }
}