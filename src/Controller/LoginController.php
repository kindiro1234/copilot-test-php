<?php

namespace App\Controller;

use App\Factory\Request\LoginRequestFactory;
use App\Service\UserServiceInterface;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class LoginController
{
    public function __construct(
        private readonly UserServiceInterface $userService,
        private readonly LoginRequestFactory $loginRequestFactory,
    ){}

    /**
     * @Route("/auth", name="auth_user", methods={"POST"})
     * @throws Exception
     */
    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $loginRequest = $this->loginRequestFactory->create($data);

        $token = $this->userService->auth($loginRequest);

        return new JsonResponse(['token' => $token->getToken()]);
    }
}