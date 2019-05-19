<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class PaintingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();

        return ($user->getRole() == 'admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'mimes:png,jpg,jpeg|max:10000',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
        ];
    }
}
