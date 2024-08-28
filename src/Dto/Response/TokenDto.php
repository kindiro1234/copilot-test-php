<?php

namespace App\Dto\Response;

class TokenDto
{
    public function __construct(private readonly string $token){}

    public function getToken(): string
    {
        return $this->token;
    }
}