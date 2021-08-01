<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\BadRequestException;
use App\Helper\V1\UserHelper;
use App\Http\Requests\V1 as Requests;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Traits\Common\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    use ResponseTrait;
    protected $language_path = 'api/v1/messages.';

    /**
     * register the normal user
     *
     * @param Requests\UserRegisterRequest $request
     * @return void
     */
    public function register(Requests\UserRegisterRequest $request)
    {
        $user = User::create(UserHelper::registerUserData($request));
        $user->access_token = $user->createToken('Api access token')->accessToken;
        return $this->apiResponse(new UserResource($user), $this->lang_message('register_success'));
    }

    /**
     * login the user with provided credentials
     *
     * @param Requests\UserLoginRequest $request
     * @return json
     */
    public function login(Requests\UserLoginRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            throw new BadRequestException($this->lang_message('invalid_credentials'));
        }

        $user = Auth::user();
        $user->access_token = $user->createToken('Api access token')->accessToken;
        return $this->apiResponse(new UserResource($user), $this->lang_message('login_success'));
    }

    /**
     * logout the user
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->apiResponse([], $this->lang_message('logout_success'));
    }

    /**
     * this function is used to change the logged in user password
     *
     * @param Requests\ChangePasswordRequest $request
     * @return json
     */
    public function changePassword(Requests\ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = $request->password;
        $user->save();
        return $this->apiResponse([], $this->lang_message('password_changed'));

    }
}
