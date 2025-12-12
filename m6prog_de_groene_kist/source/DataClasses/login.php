<?php
require_once  __DIR__ . '/../database.php';

class login 
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
}
