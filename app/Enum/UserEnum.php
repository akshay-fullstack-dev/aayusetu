<?php

declare(strict_types=1);

namespace App\Enum;

class UserEnum
{
    const MALE = 1;
    const FEMALE = 2;
    const OTHER = 3;

    // NORMAL LOGIN USER
    const NORMAL_LOGIN = 1;
    const GMAIL_LOGIN = 2;
    const FACEBOOK_LOGIN = 3;
    const APPLE_LOGIN = 4;

    // account status
    const VERIFIED = 1;
    const NOT_VERIFIED = 2;

    // user roles

    // roles
    const SUPPER_ADMIN_ROLE = 1;
    const ADMIN_ROLE = 2;
    const DOCTOR_ROLE = 3;
    const CLIENT_ROLE = 4;
}
