<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('appointment_name');
            $table->string('appointment_day');
            $table->text('hours');
            $table->string('cost');
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
        Schema::dropIfExists('appointments');
    }
}
