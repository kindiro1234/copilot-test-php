<?php

namespace App\Factory;

use App\Dto\Request\RegisterUserRequestDto;
use App\Entity\User;
use DateTime;

class UserFactory
{
    public function createUser(RegisterUserRequestDto $addUserRequestDto): User{
        $user = new User();
        $user->setName($addUserRequestDto->getName())
            ->setEmail($addUserRequestDto->getEmail())
            ->setPhone($addUserRequestDto->getPhone())
            ->setPassword($addUserRequestDto->getPassword())
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime());
        return $user;
    }
}