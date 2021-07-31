<?php

namespace App\Traits\Common;

use App\Exceptions\BadRequestException;
use Illuminate\Contracts\Validation\Validator;

trait RequestValidationError
{

    protected function failedValidation(Validator $validator)
    {
        throw new BadRequestException($validator->errors()->first());
    }
}
