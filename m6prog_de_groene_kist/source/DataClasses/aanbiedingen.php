<?php
require_once __DIR__ . '/../database.php';

class aanbiedingen 
{
    public int $idaanbiedingen;
    public int $korting;
    public int $product_idproduct;

    public function __construct(int $idaanbiedingen, int $korting, int $product_idproduct) 
    {
        $this->idaanbiedingen = $idaanbiedingen;
        $this->korting = $korting;
        $this->product_idproduct = $product_idproduct;
    }

    public static function GetAllAanbiedingen($connection)
    {
        $query = "SELECT p.idproduct, p.naam, p.prijs, p.category, a.korting, a.idaanbiedingen, a.product_idproduct FROM aanbiedingen a JOIN product p ON a.product_idproduct = p.idproduct";
        $result = $connection->query($query);
        $aanbiedingen = [];
        while ($row = $result->fetch_assoc()) {
            $aanbieding = new self(
                $row['idaanbiedingen'],
                $row['korting'],
                $row['product_idproduct']
            );
            // Add product properties to the aanbieding object for easy access in the view
            $aanbieding->naam = $row['naam'];
            $aanbieding->prijs = $row['prijs'];
            $aanbieding->category = $row['category'];
            $aanbiedingen[] = $aanbieding;
        }
        return $aanbiedingen;
    }
}
