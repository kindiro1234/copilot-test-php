<?php

namespace App\Factory\Request;

use App\Dto\Request\LoginUserRequestDto;

class LoginRequestFactory
{
    public function create(array $payload): LoginUserRequestDto
    {
        return new LoginUserRequestDto(
            $payload['phone'],
            $payload['password']
        );
    }
}