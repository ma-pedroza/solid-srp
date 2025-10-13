<?php

declare(strict_types=1);

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Domain\SimpleProductValidator;

class ProductService
{
    private SimpleProductValidator $validator;
    private ProductRepository $repository;

    public function __construct(SimpleProductValidator $validator, ProductRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    /**
     * @param array{name?:string:price?:int} $input
     */
    public function create(array $input): bool
    {
       $errors = $this->validator->validate($input);

       if (!empty($errors)) {
            return false;
       }

       $product = [
        'name' => isset($input['name']) ? (string) $input['name'] : 'Seu Produto',
        'price' => isset($input['price']) ? $input['price'] : 0.00,
       ];

       $this->repository->save($product);
       return true;
    }
}