<?php
require_once  __DIR__ . '/../database.php';

class klant 
{
    public int $idklant;
    public string $Naam;
    public string $leeftijd;
    public string $woonplaats;
    public int $login_idlogin;

    public function __construct(int $idklant, string $Naam, string $leeftijd, string $woonplaats, int $login_idlogin) 
    {
        $this->idklant = $idklant;
        $this->Naam = $Naam;
        $this->leeftijd = $leeftijd;
        $this->woonplaats = $woonplaats;
        $this->login_idlogin = $login_idlogin;
    }
}
