<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class semesterRequest extends FormRequest
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
        return ['nama_semester' => 'required|string|max:20'];
    }
}
