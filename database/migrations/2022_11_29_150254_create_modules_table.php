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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string("name", 64);
            $table->string("description", 256)->nullable(true);
            $table->bigInteger("nb_downloads")->nullable(true);
            $table->bigInteger("nb_active_installations")->nullable(true);
            $table->text("tags", 256)->nullable(true);
            $table->decimal('price', 6, 2)->nullable(true);
            $table->decimal('original_price', 6, 2)->nullable(true);
            $table->string('file', 256)->nullable(true);
            $table->string('image', 256)->nullable(true);
            $table->string('video', 256)->nullable(true);
            $table->foreignId('platform_id')->nullable()->constrained('platforms')->onDelete('set null');
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
        Schema::dropIfExists('modules');
    }
};
