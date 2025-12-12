<?php
require_once __DIR__ . '/../database.php';

class klant_has_product 
{
    public int $klant_idklant;
    public int $product_idproduct;

    public function __construct(int $klant_idklant, int $product_idproduct) 
    {
        $this->klant_idklant = $klant_idklant;
        $this->product_idproduct = $product_idproduct;
    }
}
