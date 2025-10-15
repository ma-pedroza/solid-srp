<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;
use App\Application\ProductService;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.txt');
$validator = new SimpleProductValidator();
$service = new ProductService($validator, $repository);

$products = $service->list();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8 min-h-screen">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-8 pb-4 border-b border-gray-200">
            <h1 class="text-3xl font-extrabold text-blue-700">Catálogo de Produtos</h1>
            <a href="index.php" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold shadow-md">
                + Novo Produto
            </a>
        </div>

        <?php if (empty($products)): ?>
            <div class="text-center p-12 border-2 border-dashed border-blue-200 bg-blue-50 rounded-lg">
                <p class="text-lg text-blue-700 font-medium">Nenhum produto cadastrado. Adicione o primeiro item!</p>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider rounded-tl-lg">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Nome</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider rounded-tr-lg">Preço</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <?php foreach ($products as $product): ?>
                            <tr class="hover:bg-blue-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-700">
                                    <?= htmlspecialchars((string) ($product['id'] ?? 'N/A')) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-800">
                                    <?= htmlspecialchars($product['name'] ?? 'Sem Nome') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-900 font-semibold">
                                    <?php
                                        $price = (float) ($product['price'] ?? 0.00);
                                        echo 'R$ ' . htmlspecialchars(number_format($price, 2, ',', '.'));
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>