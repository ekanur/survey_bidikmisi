<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Angket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angket', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nama_item_kuesioner", 800);
            $table->string("isi_item_kuesioner", 800);
            $table->string("keterangan", 200)->nullable();
            $table->integer("nilai")->nullable();
            $table->integer("calon_penerima_id");
            $table->string("nim_surveyor", 20);
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
        //
    }
}
