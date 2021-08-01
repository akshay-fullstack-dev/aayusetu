<?php

namespace App\Http\Requests\V1;

use App\Enum\UserEnum;
use App\Traits\Common\RequestValidationError;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|min:4|max:30',
            'email' => 'required|string|email|max:30|unique:users,email',
            'password' => 'required|string|min:5|max:30',
            'confirm_password' => 'required|string|same:password',
            'phone_number' => 'required|string|min:10|max:13',
            "gender" => ['required', Rule::in([UserEnum::MALE, UserEnum::FEMALE, UserEnum::OTHER])],
        ];
    }
}
