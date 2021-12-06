<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('biaya_rakit')->nullable();
            $table->enum('status', ['dipesan', 'dibayar', 'selesai']);
            $table->string('bukti_transfer', 128)->nullable();
            $table->string('resi', 32)->nullable();
            $table->bigInteger('durasi');
            $table->boolean('is_dirakit');
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
