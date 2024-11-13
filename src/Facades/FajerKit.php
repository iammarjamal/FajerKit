<?php

namespace Iammarjamal\FajerKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iammarjamal\FajerKit\FajerKit
 */
class FajerKit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Iammarjamal\FajerKit\FajerKit::class;
    }
}
