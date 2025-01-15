<?php

namespace Cxcsz\FilamentUeditor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cxcsz\FilamentUeditor\FilamentUeditor
 */
class FilamentUeditor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Cxcsz\FilamentUeditor\FilamentUeditor::class;
    }
}
