<?php 

declare(strict_types=1);

namespace App\Domain;

use App\Contracts\ProductValidator;

final class SimpleProductValidator implements ProductValidator
{
    public function validate(array $input): array
    {
        $errors = [];

        if (empty($input['name']) || strlen($input['name']) < 2 || strlen($input['name']) > 100) {
            $errors[] = 'O nome do produto deve ter entre 2 e 100 caracteres.';
        }

        if (!isset($input['price']) || !is_numeric($input['price']) || $input['price'] < 0) {
            $errors[] = 'O preço do produto deve ser um número não negativo.';
        }

        return $errors;
    }
}