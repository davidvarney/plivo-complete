<?php

namespace DavidVarney\Plivo;

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
