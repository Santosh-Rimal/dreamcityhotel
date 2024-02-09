<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'roomno'=>'required|numeric',
            'type'=>'required',
            'price'=>'numeric|required',
            'floor'=>'required',
            'status'=>'required',
            'order'=>'numeric',
            'description'=>'required',
            'short_description'=>'required',
            'image'=>'image',
        ];
    }
}