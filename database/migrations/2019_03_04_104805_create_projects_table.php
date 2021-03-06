<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_name');
            $table->string('description');
            $table->string('customer_name');
            $table->string('location');
            $table->integer('contact');
           $table->string('email');
           $table->string('asignee_name');
           $table->date('start');
           $table->date('end');
           $table->string('note');
           $table->integer('days');

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
        Schema::dropIfExists('projects');
    }
}
