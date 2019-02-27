<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Core\User;

class UserTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testCreateSingleUser()
    {
        
        $user = [
            "name"      =>$this->faker->name,
            "last_name" =>$this->faker->lastName,
            "address"   =>$this->faker->address,
            "phone"     =>$this->faker->phoneNumber,
            "email"     =>$this->faker->unique()->safeEmail,
            "password"  =>$this->faker->password(15)
        ];

        $response = $this->json('POST', '/api/v1/user',$user);
        $response->assertStatus(200);
        $response->assertJson(['message' => "Usuario creado"]);
    }


    public function testUpdateSingleUser()
    {
        $user = factory(User::class)->create();

        $updateDate = [
            "last_name" => "apellido actualizado"
        ];

        $response = $this->json('PUT', '/api/v1/user/'.$user->id, $updateDate);
        $response->assertStatus(200);
        $response->assertJson(['data' => [
                ["last_name" => 'apellido actualizado']
            ]
        ]);
    }
}
