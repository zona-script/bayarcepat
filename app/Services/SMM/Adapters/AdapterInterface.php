<?php

namespace App\Services\SMM\Adapters;

use Illuminate\Http\Request;

interface AdapterInterface
{
    public function getProfile();
    public function getServices();
    public function syncServices();
    public function order(Request $request);
    public function orderStatus($payload);
}
