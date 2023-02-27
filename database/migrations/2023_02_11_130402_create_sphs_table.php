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
            $table->string('kegiatan')->nullable();
            $table->string('sumber_anggaran')->nullable();
            $table->decimal('nilai_pagu',10,0)->nullable();
            $table->string('metode_pembelian')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('pdf_file')->nullable();
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
