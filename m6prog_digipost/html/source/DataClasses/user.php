<?php
require_once __DIR__ . '/../database.php';

class User
{
    public int $idUser;
    public string $token;
    public string $username;
 
    public function __construct(int $idUser, string $token, string $username)
    {
        $this->idUser = $idUser;
        $this->token = $token;
        $this->username = $username;
    }

    // haal alle user op
     
    public static function GetAllUsers(): array 
    {
        global $connection;
        $users = [];
        
        $query = "SELECT idUser, token, username FROM User";
        $result = $connection->query($query);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = new User(
                    (int)$row['idUser'],
                    $row['token'],
                    $row['username']
                );
            }
        }
        
        return $users;
    }

    // haal user op via id
    public static function GetUserById(int $id): ?User 
    {
        global $connection;
        
        $stmt = $connection->prepare("SELECT idUser, token, username FROM User WHERE idUser = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            return new User(
                (int)$row['idUser'],
                $row['token'],
                $row['username']
            );
        }
        
        return null;
    }
}