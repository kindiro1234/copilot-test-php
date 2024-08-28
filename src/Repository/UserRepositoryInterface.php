<?php

declare(strict_types=1);


namespace App\Repository;

use App\Entity\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface UserRepositoryInterface
{
    /**
     * @throws Exception
     */
    public function save(User $user): void;

    /**
     * @throws NotFoundHttpException
     * @throws Exception
     */
    public function get(int $id): User;
}