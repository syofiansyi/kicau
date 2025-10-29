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
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->string('group_id')->nullable();
            $table->string('club_home_id')->nullable();
            $table->string('club_away_id')->nullable();
            $table->date('tanggal_pertandingan')->nullable();
            $table->integer('skor_home')->default(0);
            $table->string('skor_away')->default(0);
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
        Schema::dropIfExists('match');
    }
};
