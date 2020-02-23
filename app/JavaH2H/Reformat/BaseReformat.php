<?php


namespace App\JavaH2H\Reformat;


use App\Enums\PriceEnum;
use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;

class BaseReformat
{
    /* data hanya datanya saja */
    protected $data;

    /* response asli tapi sudah di ambil messagenya*/
    protected $dataRaw;

    /* response asli dari javah2h */
    protected $realData;

    public function __construct($data)
    {
        if($data['result'] == 'success') {
            $this->realData = collect($data);
            $this->initialize();
        } else {
            die(json_encode($data));
        }
    }

    public function initialize()
    {
        $this->data = $this->realData['message'];
        $this->dataRaw = $this->realData['message'];
        $this->data = $this->updatePrice(collect($this->data));
    }

    private function updatePrice($items)
    {
        $itemsUpdate = [];
        foreach ($items as $item) {
//            if (!Auth::check()) {
//                $item->price += PriceEnum::$priceReseller;
//            } else {
//                if (Auth::user()->hasRole(RoleEnum::$roleReseller)) {
//                    $item->price += PriceEnum::$priceReseller;
//                } else {
//                    $item->price += PriceEnum::$priceConsumer;
//                }
//            }
            $item->price += PriceEnum::$priceDefault;

            $itemsUpdate[] = $item;
        }
        return $itemsUpdate;
    }

    public static function make($data)
    {
        return new self($data);
    }

    public function where($key, $operator, $value)
    {
        $this->data = collect($this->data)
            ->where($key, $operator, $value)
            ->all();

        return $this;
    }

    public function whereIn($key, $value)
    {
        $this->data = collect($this->data)
            ->whereIn($key, $value)
            ->all();

        return $this;
    }

    public function getRaw()
    {
        return $this->realData;
    }

    public function getDataRaw()
    {
        return $this->dataRaw;
    }

    public function get()
    {
        return $this->data;
    }

    /* hanya unyuk game */
    public function distinct()
    {
        $this->data = collect($this->data)->map(function ($item, $key) {
            return [
                'provider_sub' => $item->provider_sub,
                'operator_sub' => $item->operator_sub
            ];
        })->unique()
            ->values()
            ->all();

        return $this;
    }

    /* hanya untuk pulsa dan turunannya */
    public function groupBy($groupBy = 'provider')
    {
        $this->data = collect($this->data)
            ->groupBy($groupBy)
            ->all();

        return $this;
    }

    public function collection()
    {
        $this->data = collect($this->data);
        return $this;
    }
}
