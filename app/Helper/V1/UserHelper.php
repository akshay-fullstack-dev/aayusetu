<?php

declare(strict_types=1);

namespace App\Helper\V1;

use App\Enum\UserEnum;
use App\Http\Requests\V1\UserRegisterRequest;

class UserHelper
{
    /**
     * this function return the array to same the user in the database
     *
     * @param Requests\UserRegisterRequest $request
     * @return array
     */
    public static function registerUserData(UserRegisterRequest $request): array
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'login_type' => UserEnum::NORMAL_LOGIN
        ];
    }
}
