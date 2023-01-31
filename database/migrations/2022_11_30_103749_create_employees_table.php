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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',64)->nullable(true);
            $table->string('lastname',64)->nullable(true);
            $table->string('email', 256)->nullable(true)->index();
            $table->string('password',64);
            $table->string('phone', 12)->nullable(true);
            $table->enum('role',['customer','admin','manager'])->default("admin");
            $table->string('image')->nullable(true);
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
        Schema::dropIfExists('employees');
    }
};
