<?php

require __DIR__ . '/../vendor/autoload.php.';

use App\Infra\FileProductRepository;
use App\Application\ProductService;
use App\Domain\SimpleProductValidator;

$file = __DIR__ . '/../storage/products.txt';

$service = new ProductService(new SimpleProductValidator(), new FileProductRepository($file));

$response = $service->create($_POST);

http_response_code($response ? 201 : 422);
?>