<?php

namespace App\Dto;

use App\Classes\Requests\Variations;

readonly class VariationsDTO implements IDto
{

    public function __construct(
        public string $variacao,
        public int $tamanho,
        public string $cor,
        public int $quantidade,
        public string $unidade,
        public int $ordem,
    )
    {}

    public function toArray(): array
    {
        return (array) $this;
    }
}
