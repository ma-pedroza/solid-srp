<?php 

declare (strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Application\UserService;
use App\Domain\UserValidator;
use App\Domain\UserRepository;
use App\Infra\FileUserRepository;

$file = __DIR__ . '/../storage/users.txt';

$userService = new UserService(new FileUserRepository($file), new UserValidator());

$usuarios = $userService->listUsers();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Usuários</title>
</head>
<?php if(empty($usuarios)): ?>
    <p>Nenhum Usuário cadastrado</p>
<?php else: ?>
<body>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php foreach($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['name'] ?></td>
            <td><?= $usuario['email'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
    
</body>
</html>

<style>
  body {
    font-family: 'Courier New', sans-serif;
    background-color: #f9f9f9;
    padding: 40px;
  }

  table {
    width: 30%;
    border-collapse: collapse;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  th, td {
    padding: 12px 16px;
    border-bottom: 1px solid #ddd;
    text-align: left    ;
  }

  th {
    background-color: #4c5eafff;
    color: white;
    font-weight: normal;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  p {
    text-align: center;
    font-weight: bold;
    font-size: 2rem;
  }
</style>
