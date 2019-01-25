<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('varsity');
            $table->string('semester');
            $table->string('year');
            $table->string('department');
            $table->string('subject');
            $table->tinyinteger('term')->default('0');
            $table->string('batch');
            $table->string('page1');
            $table->string('page2')->nullable();
            $table->string('page3')->nullable();
            $table->integer('user_id');
            $table->tinyinteger('status')->default('0');
            $table->string('comment')->default('Everything Good');
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
        Schema::dropIfExists('questions');
    }
}
