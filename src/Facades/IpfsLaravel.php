<?php

namespace Fliq\IpfsLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class IpfsLaravel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ipfs-laravel';
    }
}
