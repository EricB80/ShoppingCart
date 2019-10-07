<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCartItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('quantity')->null(false)->default(1);
            $table->timestamps();

            $driver = DB::getDriverName();

            //if using Ssqlite for testing, don't add FKs since not supported
            if ($driver !== 'sqlite') {
                $table->foreign('cart_id')->references('id')->on('carts');
                $table->foreign('item_id')->references('id')->on('items');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
