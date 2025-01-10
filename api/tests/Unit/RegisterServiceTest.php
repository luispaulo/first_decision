<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\RegisterService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterServiceTest extends TestCase
{
    use RefreshDatabase;

    protected RegisterService $registerService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->registerService = new RegisterService();
    }

    public function test_registros_salvo_com_sucesso()
    {
        $data = [
            'name' => 'Luis Paulo Santos',
            'email' => 'luispaulo@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $result = $this->registerService->registerUser($data);

        $this->assertTrue($result['success']);
        $this->assertEquals('Usuário registrado com sucesso!', $result['message']);
        $this->assertDatabaseHas('users', [
            'name' => 'Luis Paulo Santos',
            'email' => 'luispaulo@example.com',
        ]);
    }

    public function test_registro_com_dados_invalidos()
    {
        $data = [
            'name' => '',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'short',
        ];

        $result = $this->registerService->registerUser($data);

        $this->assertFalse($result['success']);
        $this->assertArrayHasKey('errors', $result);
        $this->assertArrayHasKey('name', $result['errors']->toArray());
        $this->assertArrayHasKey('email', $result['errors']->toArray());
        $this->assertArrayHasKey('password', $result['errors']->toArray());
    }

    public function test_listar_usuario_sucesso()
    {
        User::factory()->count(15)->create();

        $result = $this->registerService->listUsers();

        $this->assertTrue($result['success']);
        $this->assertCount(10, $result['data']->items());
        $this->assertEquals(1, $result['data']->currentPage());
    }
}
