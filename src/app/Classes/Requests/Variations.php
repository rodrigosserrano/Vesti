<?php

namespace App\Classes\Requests;

class Variations extends Base
{

    public function __construct(
        public ?int $page = 1,
        public ?int $perPage = 1000,
    )
    {
        parent::__construct(
            path: 'public/variacoes.json',
            url: 'https://erpxpto.com.br/api/v1/variacoes',
            page: $this->page,
            perPage: $this->perPage
        );

        $this->lazyCollection();
    }
}
