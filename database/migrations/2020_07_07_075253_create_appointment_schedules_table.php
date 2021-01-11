<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->dateTime('start_time', 0);
            $table->dateTime('end_time', 0);
            $table->string('title');
            $table->enum('status', ['0','1','2'])
            ->comment('0 -> Active, 1 -> Completed, 2 -> Re-scheduled')
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
        Schema::dropIfExists('appointment_schedules');
    }
}
