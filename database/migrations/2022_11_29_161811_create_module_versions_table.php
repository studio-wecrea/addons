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
        Schema::create('versions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64);
            $table->string('location', 256);
            $table->string('git_link');
            $table->string('demo_link');
            $table->string('demo_bo_link');
            $table->string('documentation_link');
            $table->tinyInteger('nb_download');
            $table->tinyInteger('nb_active_installations');
            $table->json('metadatas');
            $table->string('changelog');
            $table->foreignId('module_id')->nullable()->constrained('modules')->onDelete('set null');
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
        Schema::dropIfExists('module_versions');
    }
};
