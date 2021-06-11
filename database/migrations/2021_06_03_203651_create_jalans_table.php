<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->text('lokasi');
            $table->string('panjang');
            $table->string('kedalaman');
            $table->string('gambar');
            $table->string('status')->comment('1 = baru, 2 = ringan, 3 = berat');
            $table->boolean('selesai')->nullable()->default(0);
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jalan');
    }
}
