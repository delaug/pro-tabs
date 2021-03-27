<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->string('lang', 8);
            $table->unsignedBigInteger('instrument_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrument_translations');
    }
}
