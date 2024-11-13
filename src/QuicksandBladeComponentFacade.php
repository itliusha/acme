<?php

namespace Itliusha\QuicksandBladeComponent;

use Illuminate\Support\Facades\Facade;

class QuicksandBladeComponentFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'quicksand-blade-component';
    }
}
