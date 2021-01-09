<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranZakatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_zakat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->nullable();
            $table->string('nama_pengirim', 25);
            $table->string('asal_bank', 40);
            $table->string('jenis_zakat', 30);
            $table->decimal('nominal', 10,2);
            $table->string('image');
            $table->string('status', 20)->default('Proses Verifikasi');
            $table->softDeletes();
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
        Schema::dropIfExists('pembayaran_zakat');
    }
}
