<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
        'name'=>'required',
        'phone'=>'required|numeric',
        'email'=>'required|email',
        'country'=>'required',
        'type'=>'required',
        'quantity'=>'required|numeric',
        'checkindate'=>'required',
        'checkoutdate'=>'required',
        'airportpickup'=>'required',
        'message'=>'required|string',
        ];
    }
}