<?php

declare(strict_types=1);


namespace App\Factory\Request;

use App\Dto\Request\RegisterUserRequestDto;

class UserRequestFactory
{
    // create methode create: args array $payload
    public function create(array $payload): RegisterUserRequestDto
    {
        // create new RegisterUserRequestDto object
        return new RegisterUserRequestDto(
            $payload['name'],
            $payload['email'],
            $payload['phone'],
            $payload['password']
        );
    }
}