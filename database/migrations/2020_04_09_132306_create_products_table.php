<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('name')->unique();
            $table->integer('quantity');
            $table->enum('category', ['Phone', 'Laptop', 'Computer','Accessory','TV','Tablet','Camera','Gaming','Other']);
            $table->enum('brand',['Apple','Samsung','Sony','Huwai','Other']);
            $table->longText('description');
            $table->float('basic_price');
            $table->float('price');
            $table->boolean('promo')->default(false);
            $table->boolean('promo_percentage')->default(0);
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
        Schema::dropIfExists('products');
    }
}
