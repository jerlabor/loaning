<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrower extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|max:255|date',
            'gender' => 'required|max:1',
            'referrer_id' => 'required|numeric',
            'referrals' => 'required|array',
            'barangay_captain' => 'nullable|string|max:255',
            'street' => 'required|string',
            'city' => 'required|numeric',
            'barangay' => 'required|numeric',
            'province' => 'required|numeric',
            'other_SOI' => 'nullable',
            'contact_num' => 'required|string|min:11',
            'civil_status' => 'required|numeric',
        ];
    }
}
