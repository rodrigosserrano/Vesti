<?php

namespace App\Dto;

readonly class ErpDTO implements IDto
{
    public function __construct(
        public string $companyUuid
    )
    {}

    public function toArray(): array
    {
        return (array) $this;
    }
}
