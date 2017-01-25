<?php

namespace DavidVarney\Plivo\Facades;

use Illuminate\Support\Facades\Facade;

class Plivo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'plivo';
    }
}
