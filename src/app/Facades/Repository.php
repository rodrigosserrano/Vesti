<?php

namespace App\Facades;

use App\Repositories\ErpRepository;
use App\Repositories\VestiRepository;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ErpRepository erp()
 * @method static VestiRepository vesti()
 */
class Repository extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'repositories';
    }
}
