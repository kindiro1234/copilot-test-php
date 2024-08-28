<?php

namespace App\Service;

use App\Dto\Request\LoginUserRequestDto;
use App\Dto\Response\TokenDto;

interface UserServiceInterface
{
    public function auth(LoginUserRequestDto $loginUserRequestDto): TokenDto;
}