<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->Increments('id')->unsigned();
            $table->string('slug')->unique();
            $table->timestamps();
        });
        Schema::create('position_employees', function (Blueprint $table) {
            $table->integer('emp_id')->unsigned();
            $table->integer('position_id')->unsigned();
          

            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('position_employees', function (Blueprint $table) {
            
            $table->dropForeign(['position_id']);
            $table->dropForeign(['emp_id']);
           });
     
        Schema::dropIfExists('position_employees');
        Schema::dropIfExists('positions');
    }
};
