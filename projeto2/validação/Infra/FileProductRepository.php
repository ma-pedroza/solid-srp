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

    public function getAll(): void
    {
        
    }

}