<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function response(array $errors)
    {
        $messages = array_flatten($errors);

        return error(VALIDATION_FAILED, 'Bad request.', VALIDATION_FAILED, $messages);
    }
}
