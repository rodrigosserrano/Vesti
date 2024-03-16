<?php

namespace App\Classes\Requests;

class Products extends Base
{

    public function __construct(
        public ?int $page = 1,
        public ?int $perPage = 1000,
    )
    {
        parent::__construct(
            path: 'public/produtos.json',
            url: 'https://erpxpto.com.br/api/v1/produtos',
            page: $this->page,
            perPage: $this->perPage
        );

        $this->lazyCollection();
    }
}
