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
        Schema::create('klasement', function (Blueprint $table) {
            $table->id();
            $table->string('nama_burung')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('photo')->nullable();
            $table->string('slug');
            $table->integer('posisi')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('klasement');
    }
};
