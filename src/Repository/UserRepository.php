<?php

declare(strict_types=1);


namespace App\Repository;

use App\Entity\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Polyfill\Intl\Icu\Exception\MethodNotImplementedException;

class UserRepository implements UserRepositoryInterface
{

    public function save(User $user): void
    {
        throw new MethodNotImplementedException('Method not implemented');
    }

    public function get(int $id): User
    {
        throw new NotFoundHttpException('User with id ' . $id . ' not found');
    }
}