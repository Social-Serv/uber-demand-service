<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindDriverRequest extends FormRequest
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
            'client_id' => 'required',
            'params' => 'required',
            'params.capacity' => 'required',
            'params.car_types' => 'required|array',
            'from_point' => 'required',
            'from_point.location' => 'required',
            'from_point.location.latitude' => 'required',
            'from_point.location.longitude' => 'required',
            'from_point.address.address_full' => 'required',
            'to_point' => 'required',
            'to_point.location' => 'required',
            'to_point.location.latitude' => 'required',
            'to_point.location.longitude' => 'required',
            'to_point.address.address_full' => 'required',
            'timestamp' => 'present'
        ];
    }
}
