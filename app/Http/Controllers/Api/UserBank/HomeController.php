<?php

namespace App\Http\Controllers\Api\UserBank;

use App\BankMaster;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserBankStore;
use App\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $userBanks = UserBank::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'berhasil',
            'data' => $userBanks
        ]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserBankStore $request)
    {
        $bankMaster = BankMaster::findOrFail($request->selected_bank_id);

        if (!blank($request)) {
            $userBank = UserBank::create([
                'user_id' => auth()->id(),
                'bank_master_id' => $request->selected_bank_id ?? '',
                'bank_account_name' => $request->bank_account_name ?? '',
                'bank_account_number' => $request->bank_account_number ?? '',
                'notes' => $request->notes ?? ''
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'berhasil disimpan',
            'data' => []
        ]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $userBank = UserBank::where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        if (blank($userBank)) {
            return response()
                ->json([
                    'success' => false,
                    'message' => 'gagal dihapus',
                    'data' => []
                ], 422);
        }

        $userBank->delete();

        return response()->json([
            'success' => true,
            'message' => 'berhasil',
            'data' => []
        ]);
    }
}
