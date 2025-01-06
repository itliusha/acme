<?php

namespace Itliusha\Acme\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Itliusha\Acme\Acme
 */
class Acme extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'acme';
    }
}
