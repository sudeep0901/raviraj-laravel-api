<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile',50);
            $table->string('email')->nullable();
            $table->text('measurement')->nullable();
            $table->binary('avatar')->nullable();
            // $table->integer('age');
            // $table->date('dob');
            // $table->enum('gender',['Male','Female']);
            $table->text('remarks')->nullable();
            $table->string('createdby',50)->nullable();;
            $table->string('updatedby',50)->nullable();;
            $table->string('deletedby',50)->nullable();;
            $table->dateTime('createdat')->nullable();;
            $table->date('updatedat')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
