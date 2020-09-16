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
            'note' => 'nullable',
            'is_active' => 'required',
            'credential' => 'required|json'
        ]);

        $config = [
            'result_in' => $request->input('config_result_in', 'data'),
            'field_status_available' => $request->input('config_field_status_available', true),
            'field_status_in' => $request->input('config_field_status_in', true),
            'filed_status_success_if_status' => $request->input('config_status', true)
        ];

        $resultData = [
            'service_id' => $request->input('result_data_service_id', 'id'),
            'name' => $request->input('result_data_name', 'name'),
            'price' => $request->input('result_data_price', 'price'),
            'min' => $request->input('result_data_min', 'min'),
            'max' => $request->input('result_data_max', 'max'),
            'category' => $request->input('result_data_category', 'category'),
            'note' => $request->input('result_data_note', 'description'),
        ];

        $providerPanel = ProviderPanel::create([
            'name' => $request->input('name', ''),
            'website' => $request->input('website', ''),
            'note' => $request->input('note', ''),
            'is_active' => $request->input('active', false),
            'credential' => $request->input('credential'),
            'config' => $config,
            'format_data' => $resultData,
            'get_profile_url' => $request->input('get_profile_url', ''),
            'get_profile_append_data' => json_encode($request->input('get_profile_append_data', [])),
            'get_profile_http_method' => $request->input('get_profile_http_method', 'POST'),

            'get_services_url' => $request->input('get_services_url', ''),
            'get_services_append_data' => $request->input('get_services_append_data', []),
            'get_services_http_method' => $request->input('get_services_http_method', 'POST'),

            'check_status_url' => $request->input('check_status_url', ''),
            'check_status_append_data' => json_encode($request->input('check_status_append_data', [])),
            'check_status_http_method' => $request->input('check_status_http_method', 'POST'),

            'create_order_url' => $request->input('create_order_url', ''),
            'create_order_append_data' => json_encode($request->input('create_order_append_data', [])),
            'create_order_http_method' => $request->input('create_order_http_method', 'POST'),

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
