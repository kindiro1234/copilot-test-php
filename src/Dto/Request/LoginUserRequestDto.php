<?php

namespace App\Dto\Request;

class LoginUserRequestDto
{
    public function __construct(private readonly string $phone, private readonly string $password){}

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

}