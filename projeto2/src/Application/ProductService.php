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
     * @param array{name?:string:price?:float} $input
     * @return array{success: bool, errors: array<string>}
     */
    public function create(array $input): array
    {
        $errors = $this->validator->validate($input);

        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }

        $product = [
            'name' => isset($input['name']) ? (string) $input['name'] : 'Seu Produto',
            'price' => isset($input['price']) ? (float) $input['price'] : 0.00,
        ];

        $this->repository->save($product);

        return [
            'success' => true,
            'errors' => []
        ];
    }

    /**
     * Lista todos os produtos.
     *
     * @return array<array{id:int, name:string, price:float}>
     */
    public function list(): array
    {
        return $this->repository->findAll();
    }
}
