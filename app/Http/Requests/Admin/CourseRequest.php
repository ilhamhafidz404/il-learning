<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Session::get('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'sks' => 'required',
            'file' => ['required', 'mimes:png,jpg,jpeg,svg'],
            'description' => 'required',
            'program' => 'required'
        ];
    }
}
