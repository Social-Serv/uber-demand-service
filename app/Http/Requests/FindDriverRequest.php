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
            'rider_id' => 'required',
            'car' => 'required',
            'car.passengers_capacities' => 'required|array',
            'car.car_classes_id' => 'required|array',
            'geo' => 'required',
            'geo.coord.lat' => 'required',
            'geo.coord.long' => 'required',
            'geo.addr' => 'required',
            'geo.addr.addr_string' => 'required',
            'request_timestamp' => 'present'
        ];
    }
}
