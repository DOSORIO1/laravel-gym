<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('age');
            $table->bigInteger('weight');
            $table->string('nivel')->nullable();
            $table->string('fingerprint')->nullable();
            $table->string('email');
            $table->string('injures');
            $table->dateTime('time')->nullable();
            $table->foreignId('companies_id')->constrained();
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
        Schema::dropIfExists('clients');
    }
}
