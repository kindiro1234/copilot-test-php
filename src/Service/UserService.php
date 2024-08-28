<?php

namespace App\Service;

use App\Dto\Request\LoginUserRequestDto;
use App\Dto\Response\TokenDto;
use Symfony\Polyfill\Intl\Icu\Exception\MethodNotImplementedException;

class UserService implements UserServiceInterface
{
    public function auth(LoginUserRequestDto $loginUserRequestDto): TokenDto
    {
        throw new MethodNotImplementedException('Method not implemented');
    }
}