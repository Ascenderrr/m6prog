<?php

require_once __DIR__ . '/../database.php';

class User
{
    public int $iduser;
    public string $name;
    public string $bericht;

    public function __construct(int $iduser, string $name, string $bericht)
    {
        $this->iduser = $iduser;
        $this->name = $name;
        $this->bericht = $bericht;
    }

    public function insert()
    {
        global $connection;
        $stmt = $connection->prepare("INSERT INTO user (name, bericht) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->name, $this->bericht);
        $stmt->execute();
    }
}
    
function getAllUsers(): array{
    global $connection;
    $stmt = $connection->prepare("SELECT iduser, name, bericht FROM user");
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = new User($row['iduser'], $row['name'], $row['bericht']);
    }
    return $users;
}
