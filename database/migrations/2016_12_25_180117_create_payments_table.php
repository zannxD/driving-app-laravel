<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('payments', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('customer_id')->nullable();
      $table->string('description')->nullable();
      $table->string('type');
      $table->double('amount');
      $table->date('date');
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
    Schema::dropIfExists('payments');
  }
}
