<?php

declare(strict_types=1);

namespace App\Infra;

use App\Domain\UserRepository;

final class FileUserRepository implements UserRepository
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

    /**
     * @param array{name:string,email:string,password:string} $user
     */

    public function save(array $user): void
    {
        file_put_contents(
            $this->filePath,
            json_encode($user, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND
        );
    }

    public function findAll(): array
    {
        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $users = [];

        foreach ($lines as $line) {
            $user = json_decode($line, true);
            if (is_array($user)) {
                $users[] = $user;
            }
        }

        return $users;
    }
}
