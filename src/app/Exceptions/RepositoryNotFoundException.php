<?php

namespace App\Exceptions;

use Symfony\Component\ErrorHandler\Error\ClassNotFoundError;
use Throwable;

class RepositoryNotFoundException extends ClassNotFoundError
{
    public function __construct(
        string $message,
        ?Throwable $previous = null
    )
    {
        parent::__construct($message, $previous);
    }
}
