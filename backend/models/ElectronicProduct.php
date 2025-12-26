<?php
namespace backend\models;

require_once 'Product.php';

/**
 * Child class: ElectronicProduct
 * Product sinfidan meros oladi va qo'shimcha xususiyat - warranty
 */
class ElectronicProduct extends Product
{
    public $warranty; // Kafolat muddati oylar bilan

    public function __construct($name, $price, $warranty)
    {
        parent::__construct($name, $price); // Parent constructor
        $this->warranty = $warranty;
    }

    public function getWarrantyInfo()
    {
        return "{$this->name} has {$this->warranty} months warranty";
    }
}
