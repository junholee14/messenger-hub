<?php

namespace Junholee14\MessengerHub\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Junholee14\MessengerHub\MessengerHub
 */
class MessengerHub extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Junholee14\MessengerHub\MessengerHub::class;
    }
}
