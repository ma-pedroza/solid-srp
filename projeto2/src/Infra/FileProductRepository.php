<?php

declare(strict_types=1);

namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $dir = dirname($this->filePath);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if (!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }

    public function save(array $product): void
    {
        $nextId = $this->getLastProductId() + 1;

        $productWithId = [
            'id' => $nextId,
            'name' => $product['name'],
            'price' => $product['price'],
        ];

        file_put_contents(
            $this->filePath,
            json_encode($productWithId, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND
        );
    }

    public function findAll(): array
    {
        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $products = [];

        foreach ($lines as $line) {
            $product = json_decode($line, true);
            if (is_array($product)) {
                if (isset($product['price'])) {
                    $product['price'] = (float) $product['price'];
                }
                $products[] = $product;
            }
        }

        return $products;
    }

    public function getLastProductId(): int
    {
        $products = $this->findAll();
        if (empty($products)) {
            return 0;
        }

        $lastProduct = end($products);
        return (int) ($lastProduct['id'] ?? 0);
    }
}