<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductRepository
{
    /**
     * Retorna todos os produtos do repositório.
     *
     * @return array<array{id:int, name:string, price:float}>
     */
    public function findAll(): array;

    /**
     * Retorna o último ID de produto cadastrado.
     *
     * @return array<array{id:int, name:string, price:float}>
     */
    public function getLastProductId() : int;    

    /**
     * Salva um novo produto no repositório.
     *
     * @param array{name:string, price:float} $product
     */
    public function save(array $product) : void;
}