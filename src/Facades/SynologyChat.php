<?php
namespace Allen\Synology\Facades;

use Illuminate\Support\Facades\Facade;

class SynologyChat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SynologyChat';
    }
}
