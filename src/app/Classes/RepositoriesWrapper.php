<?php

namespace App\Classes;

use App\Exceptions\RepositoryNotFoundException;
use Mockery\Exception;
use Symfony\Component\ErrorHandler\Error\ClassNotFoundError;

class RepositoriesWrapper
{
    private array $dict = [];

    public function __call(string $name, array $arguments)
    {
        if (array_key_exists($name, $this->dict))
        {
            return $this->dict[$name];
        }

        $className = class_exists("App\\Repositories\\" . ucfirst($name) . "Repository")
            ? "App\\Repositories\\" . ucfirst($name) . "Repository"
            : null;

        if (is_null($className)) {
            throw new RepositoryNotFoundException('Repository não encontrado');
        }

        return $this->dict[$name] = app($className);
    }
}
