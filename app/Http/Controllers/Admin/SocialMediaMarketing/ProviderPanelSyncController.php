<?php

namespace App\Http\Controllers\Admin\SocialMediaMarketing;

use App\Http\Controllers\Controller;
use App\Models\PanelProduct;
use App\Models\ProviderPanel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ProviderPanelSyncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
//        $rx = Http::asForm()->post('https://lollipop-smm.com/api/services', [
//            'api_id' => '7623',
//            'api_key' => '0f4140-66b39b-91920a-8895df-7a7bf9',
//        ]);
//        return $rx;

        $providerPanel = ProviderPanel::findOrFail($id);

        $providerPanelArr = collect($providerPanel)->toArray();
        $payload = $providerPanel->credential;

        $url = $providerPanelArr['get_services_url'];
        $customPayload = $providerPanelArr['get_services_append_data'];
        $httpMethod = $providerPanelArr['get_services_http_method'];

        $customPayload = [
            'x-request-from' => 'www.bayarcepat.com',
            'x-security-engine' => 'fex-indonesia',
            'x-defence' => 'anonymous-exception-defender',
        ];

        foreach ($customPayload as $key => $value) {
            $payload = Arr::add($payload, $key, $value);
        }

        $response = Http::asForm()->post($url, $payload);
        $responseBody = collect(json_decode($response->body()))->toArray();

//        return response()->json(\GuzzleHttp\json_decode($response->body()));

        if (!$response->ok()) {
            echo "GAGAL <hr>";
            die(json_encode($responseBody));
        }

        if (!blank($providerPanel->config)) {
            if (
                isset($providerPanel->config['result_in']) &&
                isset($providerPanel->config['field_status_available']) &&
                isset($providerPanel->config['field_status_in']) &&
                isset($providerPanel->config['field_status_success_if_status'])
            ) {
                if ($providerPanel->config['field_status_available']) {
                    $status = $responseBody[$providerPanel->config['field_status_in']];
                    if ($status == $providerPanel->config['field_status_success_if_status']) {
                        if ($providerPanel->config['result_in'] == '#' || blank($providerPanel->config['result_in'])) {
                            $products = $responseBody;
                        } else {
                            $products = $responseBody[$providerPanel->config['result_in']];
                        }
                    }else {
                        die('sikron Tidak berhasil' . json_encode($responseBody));
                    }
                } else {
                    if ($providerPanel->config['result_in'] == '#' || blank($providerPanel->config['result_in'])) {
                        $products = $responseBody;
                    } else {
                        $products = $responseBody[$providerPanel->config['result_in']];
                    }
                }
            } else {
                die('config terdapat kesalahan dalam penamaan');
            }
        } else {
            die('config belum di setting');
        }

        $this->insertData($products, $providerPanel);

        return redirect()
            ->route('web.admin.social-media-marketing.provider-panel.show', $providerPanel->id)
            ->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function insertData($products, $providerPanel) {
        foreach ($products as $product) {
            $productArr = collect($product)->toArray();
            $resultData = $providerPanel->format_data;

            try {
                PanelProduct::create([
                    'provider_panel_id' => $providerPanel->id,
                    'service_id' => $productArr[$resultData['service_id']],
                    'name' => $productArr[$resultData['name']],
                    'price' => $productArr[$resultData['price']],
                    'min' => $productArr[$resultData['min']],
                    'max' => $productArr[$resultData['max']],
                    'category' => $productArr[$resultData['category']],
                    'note' => $productArr[$resultData['note']] ?? '',
                ]);
            } catch (QueryException $exception) {
                $panelProduct = PanelProduct::where('service_id', $productArr[$resultData['service_id']])
                    ->where('provider_panel_id', $providerPanel->id)
                    ->first();

                $panelProduct->price = $productArr[$resultData['price']];
                $panelProduct->min = $productArr[$resultData['min']];
                $panelProduct->max = $productArr[$resultData['max']];
                $panelProduct->note = $productArr[$resultData['note']] ?? '';
                $providerPanel->save();
            }
        }

    }
}
