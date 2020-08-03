<?php
namespace App\Services\Digiflazz\Buyer;

use App\Enums\PriceEnum;
use App\Traits\DigiflazzTrait;
use Illuminate\Support\Str;

class DigiflazzBuyer {
    public $connection;
    // raw result after request
    private $realData;
    // result field in 'data' => []
    private $data;
    // result for return if call get
    private $resultData;

    public function __construct()
    {
        $this->connection = new DigiflazzConnection();
    }

    private function initialize($data)
    {
        $this->realData = $data;
        $this->collectData();
        $this->updatePrice();
    }

    private function collectData()
    {
        $this->data = collect($this->realData)['data'];
    }

    private function updatePrice()
    {
        $dataUpdate = [];
        foreach ($this->data as $item) {
            if (isset($item->price)) {
                $item->price += PriceEnum::$priceDefault;
            }
            $dataUpdate[] = $item;
        }

        $this->resultData = $dataUpdate;
    }

    public function getPrepaid($codeProduct = '')
    {
        $product = $this->connection->price('prepaid ', $codeProduct);
        $this->initialize($product);

        return $this;
    }

    public function buyPrepaid($buyerSKUCode, $customerNumber, $refID, $testing = false, $msg = '')
    {
        $result = $this->connection->buyPrepaid($buyerSKUCode, $customerNumber, $refID, $testing, $msg);

        return $result;
    }

    public function getPostpaid($codeProduct = '')
    {
        $this->initialize($this->connection->price('pasca', $codeProduct));

        return $this;
    }

    public function checkBillPostpaid($buyerSKUCode, $customerNumber, $refID, $testing = false)
    {
        $result = $this->connection->checkBillPostpaid($buyerSKUCode, $customerNumber, $refID, $testing);

        return $result;
    }

    public function groupBy(string $key = 'category')
    {
        $this->resultData = collect($this->resultData)
            ->groupBy($key)
            ->all();

        return $this;
    }

    public function group($type = 'prepaid')
    {
        if ($type == 'postpaid') {
            return $this->groupForPostpaid();
        }

        $result = collect($this->resultData)
            ->groupBy('category')
            ->all();

        $temp = [];
        foreach ($result as $key => $item) {
            $temporary = [];
            $temporary['key'] = base64_encode($key);
            $temporary['slug'] = Str::slug($key);
            $temporary['name'] = $key;
            $temporary['type'] = 'category';

            $products = collect($item)
                ->groupBy('brand')
                ->all();

            $tempProduct = array();
            foreach ($products as $keyProduct => $product) {
                $tempX = [];
                $tempX['key'] = base64_encode($keyProduct);
                $tempX['slug'] = Str::slug($keyProduct);
                $tempX['name'] = $keyProduct;
                $tempX['type'] = 'brand';
                $tempX['category'] = $key;
                $tempX['products'] = $product;
                $tempProduct[] = $tempX;
            }

            $temporary['products'] = $tempProduct;
            $temp[] = $temporary;
        }

        $this->resultData = $temp;

        return $this;
    }

    private function groupForPostpaid()
    {
        $result = collect($this->resultData)
            ->groupBy('brand')
            ->all();

        $temp = [];
        foreach ($result as $key => $products) {
            $temporary = [];
            $temporary['key'] = base64_encode($key);
            $temporary['slug'] = Str::slug($key);
            $temporary['name'] = $key;
            $temporary['type'] = 'brand';
            $temporary['products'] = $products;
            $temp[] = $temporary;
        }
        $this->resultData = $temp;

        return $this;
    }

    public function distinct()
    {
        $this->resultData = collect($this->data)->map(function ($item, $key) {
            return [
                'category' => $item->category
            ];
        })->unique('category')
            ->values()
            ->all();

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    // return json
    public function get()
    {
        return $this->resultData;
    }

    public function toArray()
    {
        return (array) collect($this->resultData)->toArray()[0];
    }

    public function toObject()
    {
        return (object) collect($this->resultData)->toArray()[0];
    }
}
