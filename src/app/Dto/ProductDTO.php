<?php

namespace App\Dto;

readonly class ProductDTO implements IDto
{
    /**
     * @param array $variations
     */
    public function __construct(
        public int $referencia,
        public string $nome,
        public string $descricao,
        public string $preco,
        public int $promocao,
        public string $composicao,
        public string $marca,
        public array $variations,
    )
    {}

    public function toArray(): array
    {
        return (array) $this;
    }
}
