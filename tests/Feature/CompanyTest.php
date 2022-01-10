<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // Kita memiliki 1 user terdaftar
        $user = User::first();

        // Login sebagai user tersebut
        $this->actingAs($user);

        $response = $this->get('/companies');

        $response->assertStatus(200);
    }
}
