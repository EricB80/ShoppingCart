<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ItemControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp():void
    {
        parent::setUp();
    }

    /** @test */
    public function do_items_get_created()
    {
        $this->json('POST', '/items', [
            'name' => 'Foobar',
            'price' => '3.50',
            'taxable' => true
        ]);

        $this->seeInDatabase('items', [
            'name' => 'Foobar',
            'price' => '3.50',
            'taxable' => true
        ]);
    }
}