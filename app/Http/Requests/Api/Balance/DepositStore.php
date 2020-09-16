<?php

namespace App\Http\Requests\Api\Balance;

use Illuminate\Foundation\Http\FormRequest;

class DepositStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required',
            'selected_bank_id' => 'required|int',
            'selected_user_bank_id' => 'required|int',
            'notes' => 'nullable|string',
        ];
    }
}
