<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('model_type');
            $table->bigInteger('model_id');
            $table->bigInteger('created_by');
            $table->bigInteger('created_for');
            $table->decimal('price', 8, 2)->comment('This is the price at which order has been booked');
            $table->longText('payload')->comment('Payload holds the real deatils at which order has been placed on that paerticular time');
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
