<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileVisibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_visibilities', function (Blueprint $table) {
            $table->id();
            $table->enum('visibility_type', ['0', '1','2'])
            ->comment('0 -> Not Visble, 1 -> Publicly Visible, 2 -> Visible only inside network')
            ->default('0');
            $table->bigInteger('user_id');
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
        Schema::dropIfExists('profile_visibilities');
    }
}
