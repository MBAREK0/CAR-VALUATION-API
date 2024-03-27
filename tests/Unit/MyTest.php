<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;


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

        $user = User::factory()->create();

    }
}
