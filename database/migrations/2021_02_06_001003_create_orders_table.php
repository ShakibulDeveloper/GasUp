<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->ungsignedBigInteger('owner_id');
            $table->string('gas')->nullable();
            $table->integer('litre')->nullable();
            $table->double('price')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('address')->nullable();
            $table->string('order_id')->nullable();
            $table->ungsignedBigInteger('delivered_by')->nullable();

            $table->string('product_name');
            $table->interger('quantity');
            $table->string('date');
            $table->string('time');
            $table->string('courier');
            $table->string('username');
            $table->string('tank');
            $table->integer('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
