<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitEnquiryRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'contact_date' => 'required',
            'buy_date' => 'required',
            'vehicle_id' => 'required',
            'payment_type' => 'required',
            'occupation' => 'required',
            'address' => 'required',
            'vehicle_color' => 'required'
        ];
    }
}
