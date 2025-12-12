<?php
require_once __DIR__ . '/../database.php';

class Bericht
{
    public int $idbericht;
    public string $bericht_inhoud;
    public int $verzender;
 
    public function __construct(int $idbericht, string $bericht_inhoud, int $verzender)
    {
        $this->idbericht = $idbericht;
        $this->bericht_inhoud = $bericht_inhoud;
        $this->verzender = $verzender;
    }

    // haal alle berichten op

    public static function GetAllBerichten(): array 
    {
        global $connection;
        $berichten = [];
        
        $query = "SELECT idbericht, bericht_inhoud, User_idUser FROM Bericht";
        $result = $connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $berichten[] = new Bericht(
                    (int)$row['idbericht'],
                    $row['bericht_inhoud'],
                    (int)$row['User_idUser']
                );
            }
        }
        
        return $berichten;
    }

    // haal bericht op via id

    public static function GetBerichtById(int $id): ?Bericht 
    {
        global $connection;
        
        $stmt = $connection->prepare("SELECT idbericht, bericht_inhoud, User_idUser FROM Bericht WHERE idbericht = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            return new Bericht(
                (int)$row['idbericht'],
                $row['bericht_inhoud'],
                (int)$row['User_idUser']
            );
        }
        
        return null;
    }
}

