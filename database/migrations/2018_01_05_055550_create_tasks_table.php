<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_name');
            $table->string('task_description');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_name');
            $table->string('user_position');
            $table->string('user_email');
            $table->integer('complete');
            $table->rememberToken();
            $table->timestamps('finished_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
