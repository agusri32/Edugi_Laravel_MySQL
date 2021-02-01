<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email');
			$table->string('tempat_lahir');
			$table->date('tanggal_lahir');
			$table->enum('gender', array('pria', 'wanita'));
			$table->text('alamat');  
			$table->string('username')->nullable();
			$table->string('password')->nullable();			
            $table->timestamps();
			$table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
