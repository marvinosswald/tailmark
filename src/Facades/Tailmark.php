<?php

namespace Marvinosswald\Tailmark\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marvinosswald\Tailmark\Tailmark
 */
class Tailmark extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tailmark';
    }
}
