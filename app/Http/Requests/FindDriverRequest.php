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
            'geo_from' => 'required',
            'geo_from.coord.lat' => 'required',
            'geo_from.coord.long' => 'required',
            'geo_from.addr' => 'required',
            'geo_from.addr.addr_string' => 'required',
            'geo_to' => 'required',
            'geo_to.coord.lat' => 'required',
            'geo_to.coord.long' => 'required',
            'geo_to.addr' => 'required',
            'geo_to.addr.addr_string' => 'required',
            'request_timestamp' => 'present'
        ];
    }
}
