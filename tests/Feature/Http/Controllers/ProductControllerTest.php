<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Inertia\Testing\Assert;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $product=$product=Product::factory()->create();
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertInertia(fn(Assert $page)=>
                $page
                ->component('products')
                ->has('products',1,fn(Assert $page)=>
                 $page
                 ->where('id',$product->id)
                 ->where('price', $product->price."")  
                 ->where('name',$product->name)  
                 ->where('img',$product->img)  
                 ->where('description',$product->description)   
                )
            );
    }
}
