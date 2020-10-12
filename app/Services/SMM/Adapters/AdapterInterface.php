<?php

namespace App\Services\SMM\Adapters;

interface AdapterInterface
{
    public function getProfile();
    public function getServices();
    public function syncServices();
    public function order($payload);
    public function orderStatus($payload);
}
