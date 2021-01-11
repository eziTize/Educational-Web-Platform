<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAccomplishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_accomplishments', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug');
            $table->bigInteger('user_id');
            $table->enum('is_approved', ['0', '1'])
            ->comment('0 -> No, 1 -> Yes')
            ->default('0');
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
        Schema::dropIfExists('profile_accomplishments');
    }
}
