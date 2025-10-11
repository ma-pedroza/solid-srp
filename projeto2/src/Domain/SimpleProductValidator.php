<?php 

declare(strict_types=1);

namespace App\Domain;

use App\Contracts\ProductValidator;

final class SimpleProductValidator implements ProductValidator
{
    /**
     * @param arayy{name?:string,price?:float} $input
     */

    public function validate(array $input): array
    {
        $errors = [];

        if (strlen($input['name']) <2 or strlen($input['name']) > 100) {
            $errors[] = 'Nome deve conter entre 2 e 100 caracteres';
        }

        if ($input['price'] >= 0) {
            $errors[] = 'Preço deve ser maior do que 0';
        }

        return $errors;
    }
}