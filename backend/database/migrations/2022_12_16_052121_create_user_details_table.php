<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
            
            $table->integer('user_id_fk')->unsigned()->nullable();
			$table->foreign('user_id_fk')->references('id')->on('users')->onDelete('cascade');
            
			$table->softDeletes();
			$table->string('fname', 255);
			$table->string('lname', 255);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
