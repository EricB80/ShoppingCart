<?php

use App\Models\Cart;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CartControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp() : void
    {
        parent::setUp();
    }

    /** @test */
    public function does_cart_get_created()
    {
        $this->json('post', '/carts', [
            'total' => 1000,
            'taxes' => 0
        ]);

        $this->seeInDatabase('carts', ['total' => 1000]);
    }

    /**@test */
    public function does_cart_get_updated()
    {
        $cart = factory(Cart::class, 1)->create([
            'total' => 0,
            'taxes' => 0
        ]);

        $this->json('PUT', '/carts/' . $cart->id, [
            10
        ]);

        $this->seeInDatabase('cart_item', ['cart_id' => $cart->id, 'item_id' => 10]);
    }
}