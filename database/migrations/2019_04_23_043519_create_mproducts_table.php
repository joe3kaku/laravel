<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mproducts', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('product_id',8)->primary();
            $table->string('product_name',50);
            $table->bigInteger('product_val');
            $table->dateTime('insert_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mproducts');
    }
}
