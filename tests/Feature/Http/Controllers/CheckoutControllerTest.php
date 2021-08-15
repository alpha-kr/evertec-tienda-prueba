<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\Assert;

class CheckoutControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this
            ->get('/checkout')
            ->assertStatus(200)
            ->assertInertia(
                fn (Assert $page) =>
                $page
                    ->component('checkout')
            );
    }
}
