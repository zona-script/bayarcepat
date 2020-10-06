<?php

namespace App\Http\Controllers\Callback;

use App\Builders\BayarCepatBuilder;
use App\Models\CallbackResponse;
use App\Enums\CallbackEnum;
use App\Enums\TransactionEnum;
use App\Http\Controllers\Controller;
use App\Partners\Digiflazz\DigiflazzEnum;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DigiflazzController extends Controller
{
    private $secret = "bekecotmakannanasrasaanggur";

    public function __invoke(Request $request)
    {
        $post_data = file_get_contents('php://input');
        $signature = hash_hmac('sha1', $post_data, $this->secret);
        \Log::info($signature);

        if ($request->header('X-Hub-Signature') == 'sha1='.$signature) {
//            \Log::info(json_decode($request->getContent(), true));

            // yang baru
            $content = collect($post_data)['data']->toArray();
            $statusCode = $content['rc'];
            $callbackResponse = new CallbackResponse([
                'transaction_id' => $content['ref_id'],
                'status' => DigiflazzEnum::where($statusCode, true),
//                'status' => DigiflazzEnum::where($content['status'], true),
                'provider' => CallbackEnum::$providerDigiflazz
            ]);
            $callbackResponse->data = $content;
            $callbackResponse->provider = CallbackEnum::$providerDigiflazz;
            $callbackResponse->save();
            // end yang baru

            // yang lama
//            $content = collect($request->input('data'));
//            $statusCode = $content['rc'];
//            $callbackResponse = new CallbackResponse([
//                'transaction_id' => $content['ref_id'],
//                'status' => $content['status'],
//                'provider' => CallbackEnum::$providerDigiflazz
//            ]);
//            $callbackResponse->data = $content->toArray();
//            $callbackResponse->save();
            // end yang lama


            $transaction = Transaction::where('id', $callbackResponse->transaction_id)->first();

            if (!blank($transaction)) {
                if (DigiflazzEnum::whereInSuccess($statusCode)) {
                    $transaction->status = TransactionEnum::$statusSuccess;
                    $transaction->save();
                } elseif (DigiflazzEnum::whereInPending($statusCode)) {
                    $transaction->status = TransactionEnum::$statusProcess;
                    $transaction->save();
                } elseif (DigiflazzEnum::whereInGagal($statusCode)) {
                    $transaction->status = TransactionEnum::$statusFailed;
                    $transaction->save();

                    // refund uang
                    BayarCepatBuilder::make()
                        ->refund($transaction);

                    try {
                        $transaction->message = $content->toArray();
                        $transaction->save();
                    } catch (\Exception $exception) {
                        Log::error($content);
                    }
                }
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
            'message' => 'signature invalid.',
            'data' => ''
        ];
    }
}
