<?php


namespace App\JavaH2H\Reformat;


use Illuminate\Support\Arr;

class Game extends BaseReformat implements ReformatInterace
{
    public function groupBy($groupBy = 'provider_sub')
    {
        $this->data = collect($this->data)
            ->groupBy($groupBy)
            ->all();

        return $this;
    }
}
