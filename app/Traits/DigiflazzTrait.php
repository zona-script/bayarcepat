<?php

namespace App\Traits;

trait DigiflazzTrait
{
    private $realData;
    private $resultData;

    private function initialize($data)
    {
        $this->realData = $data;
        $this->rawData = collect($this->realData)['data'];
    }

    public function get()
    {
        return $this->resultData;
    }
}
