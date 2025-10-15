<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Application\ProductService;
use App\Domain\SimpleProductValidator;

$file = __DIR__ . '/../storage/products.txt';

$service = new ProductService(new SimpleProductValidator(), new FileProductRepository($file));

$result = $service->create($_POST);

if ($result['success']) {
    header('Location: index.php?status=success&msg=' . urlencode('Produto cadastrado com sucesso!'));
    exit();
} else {
    $error_msg = implode(' | ', $result['errors']);
    header('Location: index.php?status=error&msg=' . urlencode($error_msg));
    exit();
}