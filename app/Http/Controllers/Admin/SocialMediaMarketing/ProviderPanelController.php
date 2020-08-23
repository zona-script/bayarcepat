<?php

namespace App\Http\Controllers\Admin\SocialMediaMarketing;

use App\Enums\UniqueCode;
use App\Http\Controllers\Controller;
use App\ProviderPanel;
use Illuminate\Http\Request;

class ProviderPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $providers = ProviderPanel::all();

        return view('admin.social-media-marketing.provider-panel.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.social-media-marketing.provider-panel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'website' => 'required',
            'api_url' => 'required',
            'api_id' => 'nullable',
            'api_key' => 'nullable',
            'api_username' => 'nullable',
            'api_password' => 'nullable',
            'note' => 'nullable',
            'active' => 'required',
        ]);

        $uniqueCode = UniqueCode::providerPanel();

        $config = [
            'result_in' => $request->input('config_result_in', ''),
            'status_available' => $request->input('config_status_available', false),
            'status' => $request->input('config_status', true)
        ];

        $resultData = [
            'service_id' => $request->input('result_data_service_id', 'id'),
            'name' => $request->input('result_data_name', 'name'),
            'price' => $request->input('result_data_price', 'price'),
            'min' => $request->input('result_data_min', 'min'),
            'max' => $request->input('result_data_max', 'max'),
            'category' => $request->input('result_data_category', 'category'),
            'note' => $request->input('result_data_note', 'note'),
        ];

        $providerPanel = ProviderPanel::create([
            'code' => $uniqueCode,
            'name' => $request->input('name', ''),
            'website' => $request->input('website', ''),
            'api_url' => $request->input('api_url', ''),
            'api_id' => $request->input('api_id', ''),
            'api_key' => $request->input('api_key', ''),
            'api_username' => $request->input('api_username', ''),
            'api_password' => $request->input('api_password', ''),
            'note' => $request->input('note', ''),
            'active' => $request->input('active', false),
            'config' => $config,
            'result_data' => $resultData,
            'trx_credential' => $request->input('credential', []),
            'trx_get_profile_url' => $request->input('trx_get_profile_url', ''),
            'trx_get_profile' => $request->input('trx_get_profile', []),
            'trx_get_services_url' => $request->input('trx_get_services_url', ''),
            'trx_get_services' => $request->input('trx_get_services', []),
            'trx_check_status_url' => $request->input('trx_check_status_url', ''),
            'trx_check_status' => $request->input('trx_check_status', []),
            'trx_create_order_url' => $request->input('trx_create_order_url', ''),
            'trx_create_order' => $request->input('trx_create_order', []),
        ]);

        return redirect()
            ->route('web.admin.social-media-marketing.provider-panel.index')
            ->with('success', 'Penambahan berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $provider = ProviderPanel::with('products')->findOrFail($id);

        return view('admin.social-media-marketing.provider-panel.show', compact('provider'));
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
