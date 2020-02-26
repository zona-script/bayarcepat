<?php


namespace App\Partners\Digiflazz;


use App\Enums\PriceEnum;

class DigiflazzBuilder extends Digiflazz
{
    // data asli hasil dari response
    protected $realData;

    // data dari realData di update harganya
    protected $rawData;

    // dari rawData di ambil datanya saja
    protected $data;

    public static function make()
    {
        return new DigiflazzBuilder();
    }

    private function initialize($data)
    {
        $this->realData = $data;
        $this->rawData = collect($this->realData)['data'];
        $this->data = $this->updatePrice($this->rawData);
    }

    private function updatePrice($data)
    {
        $dataUpdate = [];
        foreach ($data as $item) {
            $item->price += PriceEnum::$priceDefault;
            $dataUpdate[] = $item;
        }
        return $dataUpdate;
    }

    public function prabayar(string $code = '')
    {
        $this->initialize($this->getPrabayar($code));
        return $this;
    }

    public function pascabayar(string $code = '')
    {
        $this->initialize($this->getPascabayar($code));
        return $this;
    }

    public function groupBy(string $key = 'brand')
    {
        $this->data = collect($this->data)
            ->groupBy($key)
            ->all();

        return $this;
    }

    public function where($key, $value)
    {
        $this->data = collect($this->data)
            ->whereIn($key, $value)
            ->all();

        return $this;
    }

    public function distinct()
    {
        $this->data = collect($this->data)->map(function ($item, $key) {
            return [
                'category' => $item->category
            ];
        })->unique('category')
            ->values()
            ->all();

        return $this;
    }

    public function pulsa()
    {
        $this->where('category', ['Pulsa']);
        return $this;
    }

    public function get()
    {
        return $this->data;
    }
}
