<?php 

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$status = $_GET['status'] ?? null;
$msg = $_GET['msg'] ?? null;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center p-4">
    
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md mt-16">
        <h1 class="text-3xl font-extrabold mb-8 text-blue-700 text-center">Cadastro de Produto</h1>

        <?php if ($status && $msg): ?>
            <div class="mb-4 p-4 rounded-lg font-medium 
                <?php echo ($status == 'success') 
                    ? 'bg-emerald-100 border border-emerald-400 text-emerald-700' 
                    : 'bg-red-100 border border-red-400 text-red-700'; 
                ?>">
                
                <?php if ($status == 'success'): ?>
                    <p>Sucesso! Produto cadastrado.</p>
                <?php else: ?>
                    <p>Erro de Validação:</p>
                    <p><?= htmlspecialchars(urldecode($msg)) ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <form action="create.php" method="POST" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nome do Produto</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150" placeholder="Ex: Monitor Ultra-Wide">
            </div>
            
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Preço (R$)</label>
                <input type="number" step="0.01" name="price" id="price" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150" placeholder="Ex: 999.90">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200 font-bold shadow-md hover:shadow-lg">
                Cadastrar Produto
            </button>
        </form>
        
        <div class="mt-8 text-center">
            <a href="products.php" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition duration-150">
                Ver Lista Completa de Produtos
            </a>
        </div>
    </div>
</body>
</html>