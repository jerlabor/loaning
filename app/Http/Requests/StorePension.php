<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePension extends FormRequest
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
            'pension_type' => 'required|numeric',
            'pension_bank' => 'required|numeric',
            'bank_branch' => 'required|numeric',
            'bank_type' => 'required|numeric',
            'pension_agency' => 'required|numeric',
            'payday' => 'required|digits_between:1,31',
            'pension' => 'required|numeric',
            'borrower_id' => 'required|numeric',
            'added_by' => 'required|numeric'
        ];
    }
}
