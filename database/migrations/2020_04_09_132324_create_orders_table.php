<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          $table->float('price')->default(100);
          $table->string('method')->default('Credit Card');
          $table->string('transaction_id')->nullable();
          $table->string('PayerID')->nullable();
          $table->enum('statut',['Received', 'Echec', 'Delivered','Shipped','Delay','Refund'])->nullable();
          $table->dateTime('date_order');
          $table->dateTime('date_delivery');
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
        Schema::dropIfExists('orders');
    }
}
