<?php

declare(strict_types=1);

namespace App\Contracts;

interface ProductValidator
{
    /**
     * Valida os dados de um produto.
     *
     * @param array{name?:string, price?:float} $input
     * @return array<string> Lista de erros de validação (vazia se válido).
     */
    public function validate(array $product): array;
}