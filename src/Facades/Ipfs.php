<?php

namespace Fliq\IpfsLaravel\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection add(string|resource|array $resources, array $options)
 */
class Ipfs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ipfs';
    }
}
