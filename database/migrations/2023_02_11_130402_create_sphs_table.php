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
        Schema::create('sphs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->string('sumber_anggaran');
            $table->decimal('nilai_pagu',10,0);
            $table->string('metode_pembelian');
            $table->string('metode_pembayaran');
            $table->string('time_line');
            $table->date('tanggal_pengiriman');
            $table->date('tanggal_instalasi');
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
        Schema::dropIfExists('sphs');
    }
};
