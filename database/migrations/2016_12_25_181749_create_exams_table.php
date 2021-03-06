<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('exams', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('customer_id')->nullable();
      $table->date('date');
      $table->string('applying_date')->nullable();
      $table->string('code');
      $table->string('type');
      $table->string('time');
      $table->string('status')->default('pending');
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
    Schema::dropIfExists('exams');
  }
}
