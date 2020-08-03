<?php

namespace App\Http\Controllers\ApiWeb\Products;

use App\Http\Controllers\Controller;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use App\Services\RandomRefID;
use App\TransactionPostpaidCheckbills;
use Illuminate\Http\Request;

class PostpaidController extends Controller
{
    protected $digiflazzBuyer;

    public function __construct(DigiflazzBuyer $digiflazzBuyer)
    {
        $this->digiflazzBuyer = $digiflazzBuyer;
    }

    public function index(Request $request)
    {
        $data = $this->digiflazzBuyer
            ->getPostpaid()
            ->group('postpaid')
            ->get();

        return response()->json($data);
    }

    public function checkbill(Request $request)
    {
        $validate = $request->validate([
            'buyer_sku_code' => 'required',
            'customer_number' => 'required',
        ]);

        if (!$validate) {
            return response()->json([
                'status' => false,
                'message' => 'Kode produk atau nomor pelanggan anda salah.'
            ]);
        }

        $refId = RandomRefID::make();
        $customerNumber = $request->customer_number;
        $buyerSkuCode = $request->buyer_sku_code;
        $isTesting = $request->has('testing');

        try {
            $checkBills = $this->digiflazzBuyer->checkBillPostpaid($buyerSkuCode, $customerNumber, $refId, true);
            $checkBills = collect($checkBills['data'])->toArray();
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan pengecekan, penyebab error tidak diketahui.'
            ]);
        }

        $postpaidCheckBill = TransactionPostpaidCheckbills::create([
            'user_id' => auth()->id(),
            'ref_id' => $checkBills['ref_id'],
            'customer_no' => $checkBills['customer_no'],
            'brand' => $checkBills['brand'],
            'customer_name' => $checkBills['customer_name'],
            'buyer_sku_code' => $checkBills['buyer_sku_code'],
            'admin' => $checkBills['admin'],
            'message' => $checkBills['message'],
            'status' => $checkBills['status'],
            'rc' => $checkBills['rc'],
            'sn' => $checkBills['sn'],
            'buyer_last_saldo' => $checkBills['buyer_last_saldo'],
            'price' => $checkBills['price'],
            'selling_price' => $checkBills['selling_price'],
            'description' => $checkBills['desc'],
        ]);

        return $checkBills;
    }

    public function store(Request $request)
    {

    }
}
