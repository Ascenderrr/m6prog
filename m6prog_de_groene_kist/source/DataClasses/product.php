<?php
require_once  __DIR__ . '/../database.php';
class product 
{
    public int $idproduct;
    public string $naam;
    public float $prijs;
    public ProductType $ProductType;

    public function __construct(int $idproduct, string $naam, float $prijs) 
    {
        $this->idproduct = $idproduct;
        $this->naam = $naam;
        $this->prijs = $prijs;
    }

     public static function GetAllFruit($connection){

        $products = [];
        $query = "SELECT * FROM product WHERE naam LIKE '%Appel%' OR naam LIKE '%Bes%' OR naam LIKE '%Peer%'";
        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            $products[] = self::FromResultRow($row);
        }
        return $products;
    }

    public static function GetAllGroente($connection){
        $products = [];
        $query = "SELECT * FROM product WHERE naam LIKE '%Tomaten%' OR naam LIKE '%Komkommer%' OR naam LIKE '%Sla%' OR naam LIKE '%Wortel%'";

        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            $products[] = self::FromResultRow($row);
        }
        return $products;
    }

    public static function FromResultRow($row)
    {
        return new product(
            $row['idproduct'],
            $row['naam'],
            $row['prijs']
        );

    }
}


