<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalonPenerima extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_penerima', function (Blueprint $table) {
            $table->increments('id');
            $table->string("no_pendaftaran", 35);
            $table->string("nama", 30);
            $table->string("alamat", 150);
            $table->string("sekolah_asal", 60);
            $table->string("nim_surveyor", 15);
            
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
        //
    }
}
