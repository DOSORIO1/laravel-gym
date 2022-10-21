<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_enters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enters_id')->constrained();
            $table->foreignId('products_id')->constrained();
            $table->bigInteger('amount');
            $table->decimal('price_unitario',11,2);
             $table->decimal('total',11,2);
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
        Schema::dropIfExists('detail_enters');
    }
}
