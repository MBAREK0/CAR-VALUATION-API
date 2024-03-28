<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;



class MyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call("migrate");
    }

    public function test_Example()
    {

        $user = User::create([
            "name"=> "test",
            "email"=> "test@test.com",
            "password"=> bcrypt("password"),
            "role"=>"user"
        ]);
        $this->assertDatabaseHas('users', [
            'email' => 'test@test.com',
        ]);

    }
}
