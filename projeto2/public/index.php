<?php 

declare(strict_types=1);

require __DIR__ . '/..vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRP 2</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>

    <form action="create.php" method="POST">
        <label>Nome <input type="text" name="name" required></label>
        <label>Preço <input type="number" name="price" required></label>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>