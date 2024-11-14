<?php

namespace Itliusha\QuicksandBladeUi;

use Illuminate\Support\Facades\Facade;

class QuicksandBladeUiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'quicksand-blade-ui';
    }
}
