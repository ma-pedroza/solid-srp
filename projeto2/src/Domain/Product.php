<?php

declare(strict_types=1);

namespace App\Domain;

class Product{

    public int $id;

    public string $name;
    
    public float $price;

    public function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}