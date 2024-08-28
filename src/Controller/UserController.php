<?php

declare(strict_types=1);


namespace App\Controller;

use App\Factory\Request\UserRequestFactory;
use App\Factory\UserFactory;
use App\Repository\UserRepositoryInterface;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UserController
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly UserRequestFactory $userRequestFactory,
        private readonly UserFactory $userFactory
    ){}

    /**
     * @Route("/register", name="register_user", methods={"POST"})
     * @throws Exception
     */
    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $userRequest = $this->userRequestFactory->create($data);
        $user = $this->userFactory->createUser($userRequest);

        $this->userRepository->save($user);

        return new JsonResponse(['id' => $user->getId()]);
    }

    /**
     * @Route("/{id}", name="get_user", methods={"GET"})
     * @throws Exception
     */
    public function getUser(int $id): JsonResponse
    {
        $user = $this->userRepository->get($id);

        return new JsonResponse([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone()
        ]);
    }
}