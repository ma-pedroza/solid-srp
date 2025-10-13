<?php 

declare(strict_types=1);

namespace App\Infra;

use App\Contracts\ProductRepository;

final class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $dir = dirname($this->filePath);

        if(!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if(!file_exists($this->filePath)) {
            touch($this->filePath);
        }
    }

    public function getAll(): array
    {
        $lines = file($this->filePath);

        $products = [];

        foreach ($lines as $line){
            $product = json_decode($line, true);

            $products[] = $product;
        }

        return $products;
    }

    public function getLastProductId(): int
    {
        $products = $this->getAll();

        if (empty($products)) {
            return 1;
        }

        $lastId = 0;

        foreach ($products as $product) {
            if($product['id'] > $lastId) {
                $lastId = $product['id'];
            }
        }

        return $lastId + 1;
    }

    public function save(array $product) : void
    {
        return;
    }
}