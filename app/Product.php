<?php


namespace App;


class Product
{
    private $name;
    private $manufacturer;
    private $price;
    private $image;

    public function __construct(String $name, String $manufacturer, Float $price, String $image)
    {
        $this->name         = $name;
        $this->manufacturer = $manufacturer;
        $this->price        = $price;
        $this->image        = $image;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function setName(String $name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getManufacturer(): String
    {
        return $this->manufacturer;
    }

    public function setManufacturer(String $manufacturer): Product
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function getPrice(): Float
    {
        return $this->price;
    }

    public function setPrice(Float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getImage(): String
    {
        return $this->image;
    }

    public function setImage(String $image): Product
    {
        $this->image = $image;
        return $this;
    }


    public static function getProducts()
    {
        return [
            new Product(
                'Mens Armani Exchange Cayde Watch AX2716',
                'Armani Exchange',
                197.51,
                'https://d1rkccsb0jf1bk.cloudfront.net/products/100035633/main/medium/AX2716_main.jpg'
            ),
            new Product(
                'Unisex Swatch Sigan Watch SO28N101',
                'Swatch',
                64.00,
                'https://d1rkccsb0jf1bk.cloudfront.net/products/100039284/main/medium/so28n101_Web2.jpg'
            ),
            new Product(
                'Unisex Swatch Masa Watch SO28B100',
                'Swatch',
                64.00,
                'https://d1rkccsb0jf1bk.cloudfront.net/products/100039283/main/medium/so28b100_Web2.jpg'
            )
        ];
    }

}
