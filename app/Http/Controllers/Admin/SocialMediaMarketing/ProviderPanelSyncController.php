<?php

namespace App\Http\Controllers\Admin\SocialMediaMarketing;

use App\Http\Controllers\Controller;
use App\PanelProduct;
use App\ProviderPanel;
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
        $providerPanel = ProviderPanel::findOrFail($id);

        if (blank($providerPanel->trx_get_services_url)) {
            abort(500, 'Data Provider Panel Kosong');
        }

        $providerPanelArr = collect($providerPanel)->toArray();
        $credential = collect(json_decode($providerPanel->trx_credential))->toArray();
        $trxGetService = collect(json_decode($providerPanel->trx_get_services))->toArray();
        $payloadGetService = [];

        foreach ($credential as $key => $item) {
            $payloadGetService[$key] = $providerPanelArr[$item];
        }

        foreach ($trxGetService as $key => $item) {
            $payloadGetService[$key] = $providerPanelArr[$item];
        }

        $response = Http::asForm()->post($providerPanel->trx_get_services_url, $payloadGetService);

        if (blank($providerPanel->config['result_in'])) {
            $products = json_decode($response->body());
        } else {
            $temp = collect(json_decode($response->body()))->toArray();
            $products = $temp[$providerPanel->config['result_in']];
        }

        foreach ($products as $product) {
            $productArr = collect($product)->toArray();
            $resultData = $providerPanel->result_data;

            try {
                PanelProduct::create([
                    'provider_panel_id' => $providerPanel->id,
                    'service_id' => $productArr[$resultData['service_id']],
                    'name' => $productArr[$resultData['name']],
                    'price' => $productArr[$resultData['price']],
                    'min' => $productArr[$resultData['min']],
                    'max' => $productArr[$resultData['max']],
                    'category' => $productArr[$resultData['category']],
                    'note' => $productArr[$resultData['note']],
                ]);
            } catch (QueryException $exception) {
                $panelProduct = PanelProduct::where('service_id', $productArr[$resultData['service_id']])
                    ->where('provider_panel_id', $providerPanel->id)
                    ->first();

                $providerPanel->price = $productArr[$resultData['price']];
                $providerPanel->min = $productArr[$resultData['min']];
                $providerPanel->max = $productArr[$resultData['max']];
                $providerPanel->note = $productArr[$resultData['note']];
                $providerPanel->save();
            }
        }

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
}
