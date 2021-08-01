<?php

namespace App\Http\Requests\V1;

use App\Traits\Common\RequestValidationError;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    use RequestValidationError;
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
            'password' => 'required|string|min:5|max:30',
            'confirm_password' => 'required|string|same:password'
        ];
    }
}
