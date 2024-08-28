<?php

namespace App\Tests\Controller;

use App\Controller\UserController;
use App\Dto\Request\RegisterUserRequestDto;
use App\Entity\User;
use App\Factory\Request\UserRequestFactory;
use App\Factory\UserFactory;
use App\Repository\UserRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserControllerTest extends TestCase
{

    private readonly UserRepositoryInterface $userRepositoryMock;
    private readonly UserRequestFactory $userRequestFactoryMock;
    private readonly UserFactory $userFactoryMock;
    private readonly UserController $userController;

    protected function setUp(): void
    {
        $this->userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $this->userRequestFactoryMock = $this->createMock(UserRequestFactory::class);
        $this->userFactoryMock = $this->createMock(UserFactory::class);

        $this->userController = new UserController(
            $this->userRepositoryMock,
            $this->userRequestFactoryMock,
            $this->userFactoryMock
        );
    }

    public function testRegister(): void
    {
        $requestData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'password' => 'securepassword'
        ];

        $request = new Request([], [], [], [], [], [], json_encode($requestData));

        $userRequestMock = $this->createMock(RegisterUserRequestDto::class);
        $userMock = $this->createMock(User::class);

        $this->userRequestFactoryMock
            ->method('create')
            ->with($requestData)
            ->willReturn($userRequestMock);

        $this->userFactoryMock
            ->method('createUser')
            ->with($userRequestMock)
            ->willReturn($userMock);

        $this->userRepositoryMock
            ->expects($this->once())
            ->method('save')
            ->with($userMock);

        $userMock
            ->method('getId')
            ->willReturn(1);

        $response = $this->userController->register($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(json_encode(['id' => 1]), $response->getContent());
    }
}
