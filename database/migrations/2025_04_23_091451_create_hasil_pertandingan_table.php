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
        Schema::create('hasil_pertandingan', function (Blueprint $table) {
            $table->id();
            $table->string('namateam1')->nullable();
            $table->string('namateam2')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('skor1')->nullable();
            $table->string('skor2')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('hasil_pertandingan');
    }
};
