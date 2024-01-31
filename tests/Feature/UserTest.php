<?php 

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
 
class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic functional test example.
     */
    public function test_create_user(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post(
            '/api/apresentar', 
            [
                'name' => 'Mateus',
                'email' => 'teste@testeautomatizado.com.br',
                'senha' => '123',
                'idade' => '32',
            ]
        );
 
        $response->assertJson([
            'status' => 'sucesso',
        ]);
    }
}