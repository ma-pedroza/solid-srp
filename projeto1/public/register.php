<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Infra\FileUserRepository;
use App\Domain\UserValidator;
use App\Application\UserService;

$file = __DIR__ . '/../storage/users.txt';

$service = new UserService(new FileUserRepository($file), new UserValidator());


$response = $service->register($_POST);

http_response_code($response ? 201 : 422);

echo $response ? 'Usuário cadastrado com sucesso' : 'Falha ao cadastrar usuário'; 
