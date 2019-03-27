<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medium');
            $table->string('reason');
            $table->string('task_name');
            $table->string('description');
            $table->string('customer_name');
            $table->string('location');
            $table->integer('contact');
           $table->string('email');
           $table->string('asignee_name');
           $table->string('status');
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
        Schema::dropIfExists('_task');
    }
}
