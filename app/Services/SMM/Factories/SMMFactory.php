<?php

namespace App\Services\SMM\Factories;

use App\Exceptions\SMMProviderNotAvailableException;
use App\Exceptions\SMMProviderNotFoundException;
use App\Services\SMM\Adapters\AdapterInterface;
use App\Services\SMM\Adapters\LolipopSMMAdapter;

class SMMFactory
{
    public static function make($smmProvider): AdapterInterface
    {
        if (blank($smmProvider)) {
            throw new SMMProviderNotAvailableException();
        }

        switch ($smmProvider->id) {
            case '1':
                return (new LolipopSMMAdapter($smmProvider));
            default:
                throw new SMMProviderNotFoundException();
        }
    }
}
