<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductRepository
{
    public function getAll() : array;

    public function getLastProductId() : int;    

    public function save(array $product) : void;
}