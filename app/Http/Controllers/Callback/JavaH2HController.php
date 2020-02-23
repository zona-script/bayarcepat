<?php

namespace App\Http\Controllers\Callback;

use App\Builders\BayarCepatBuilder;
use App\CallbackResponse;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class JavaH2HController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('content')) {
            $request->validate(['content' => 'required']);
            $content = collect($request->input('content'));

//            $callbackResponse = CallbackResponse::create([
//                'transaction_id' => $content['trxid_api'],
//                'status' => $content['status'],
//            ]);
//            $callbackResponse->data = $content;
//            $callbackResponse->save();

            $callbackResponse = new CallbackResponse([
                'transaction_id' => $content['trxid_api'],
                'status' => $content['status']
            ]);
            $callbackResponse->data = $content->toArray();
            $callbackResponse->save();

            $transaction = Transaction::where('id', $callbackResponse->transaction_id)->first();

            if (!blank($transaction)) {
                switch ($content['status']) {
                    case 4:
                        $transaction->status = TransactionEnum::$statusSuccess;
                        $transaction->save();
                        break;
                    case 3:
                        $transaction->status = TransactionEnum::$statusRefund;
                        $transaction->save();

                        // refund uang
                        BayarCepatBuilder::make()
                            ->refund($transaction);
                        break;
                    case 2:
                        $transaction->status = TransactionEnum::$statusFailed;
                        $transaction->save();

                        // refund uang
                        BayarCepatBuilder::make()
                            ->refund($transaction);
                        break;
                    default:

                }
//                if ($content['status'] = 4) { // success
//                    $transaction->status = TransactionEnum::$statusSuccess;
//                    $transaction->save();
//
//                }elseif ($content['status'] == 3) { // refund
//                    dd('aaa');
//                    $transaction->status = TransactionEnum::$statusRefund;
//                    $transaction->save();
//
//                    // refund uang
//                    BayarCepatBuilder::make()
//                        ->refund($transaction);
//
//                }elseif ($content['status'] == 2) { // gagal
//                    $transaction->status = TransactionEnum::$statusFailed;
//                    $transaction->save();
//
//                    // refund uang
//                    BayarCepatBuilder::make()
//                        ->refund($transaction);
//
//                }
            }


            if (blank($callbackResponse)) {
                return [
                    'success' => false,
                    'message' => 'content not found',
                    'data' => ''
                ];
            }

            return [
                'success' => true,
                'message' => 'data received',
                'data' => $callbackResponse
            ];
        }

        return [
            'success' => true,
            'message' => 'content is required',
            'data' => ''
        ];
    }
}
