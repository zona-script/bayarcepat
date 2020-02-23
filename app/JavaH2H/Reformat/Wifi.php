<?php


namespace App\JavaH2H\Reformat;


class Wifi extends BaseReformat implements ReformatInterace
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub

        $this->data = collect($this->data)
            ->whereIn('provider_sub', ['LAIN'])
            ->values()
            ->whereIn('operator_sub', [
                'WIFI'
            ])
            ->values();
    }
}
