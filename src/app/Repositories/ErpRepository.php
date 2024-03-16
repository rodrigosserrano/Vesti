<?php

namespace App\Repositories;

use App\Classes\Requests\Products;
use App\Classes\Requests\Variations;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ErpRepository
{
    public function products(?int $page = 1, ?int $perPage = 1000): Collection
    {
        app(Products::class, ['page' => $page, 'perPage' => $perPage]);

        try {
            return Http::get('https://erpxpto.com.br/api/v1/produtos')
                ->throw()
                ->collect();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function variations(?int $page = 1, ?int $perPage = 1000): Collection
    {
        app(Variations::class, ['page' => $page, 'perPage' => $perPage]);

        try {
            return Http::get('https://erpxpto.com.br/api/v1/variacoes')
                ->throw()
                ->collect();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
