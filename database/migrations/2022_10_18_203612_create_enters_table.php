<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('providers_id')->constrained();
            $table->bigInteger('reference');
            $table->decimal('subtotal',11,2);
            $table->decimal('total',11,2);
            $table->decimal('iva',11,2);
            $table->dateTime('date');
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
        Schema::dropIfExists('enters');
    }
}
