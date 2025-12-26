<?php
namespace backend\models;

/**
 * Parent class: Product
 * Barcha mahsulotlar uchun umumiy xususiyat va metodlar
 */
class Product
{
    public $name;   // Mahsulot nomi
    public $price;  // Mahsulot narxi

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getInfo()
    {
        return "Product: {$this->name}, Price: {$this->price}";
    }
}
