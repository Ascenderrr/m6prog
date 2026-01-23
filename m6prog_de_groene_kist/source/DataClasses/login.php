<?php
require_once  __DIR__ . '/../database.php';

class Login 
{
    public int $idlogin;
    public string $username;
    public string $password;

    public function __construct(int $idlogin, string $username, string $password) 
    {
        $this->idlogin = $idlogin;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Haalt een gebruiker op basis van username
     */
    public static function GetUserByName($connection, string $username): ?Login
    {
        $query = "SELECT * FROM login WHERE username = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            return Login::FromResultRow($row);
        }

        return null;
    }

    /**
     * Maakt een Login object van een database row
     */
    public static function FromResultRow($row): Login
    {
        return new Login(
            $row['idlogin'],
            $row['username'],
            $row['password']
        );
    }

    /**
     * Verifieert het wachtwoord met password_verify
     */
    public function VerifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
