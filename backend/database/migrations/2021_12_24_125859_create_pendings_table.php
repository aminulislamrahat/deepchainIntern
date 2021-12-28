<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendings', function (Blueprint $table) {
            $table->id();
            $table->string('g_name')->unique();
            $table->string('g_category')->nullable();
            $table->string('g_price')->nullable();
            $table->string('g_rating')->nullable();
            $table->string('yesvote')->nullable();
            $table->string('novote')->nullable();
            $table->string('v_percent')->nullable();
            $table->string('good_id')->nullable();
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
        Schema::dropIfExists('pendings');
    }
}
