<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaksi', function (Blueprint $table) {
         $table->id();
         $table->bigInteger('dosen_id')->unsigned();
         $table->bigInteger('matakuliah_id')->unsigned();
         $table->bigInteger('waktu_id')->unsigned();
         $table->timestamps();
      });
    
      //create pivot table post_tag
      Schema::create('post_tag', function (Blueprint $table) {
         $table->integer('post_id');
         $table->integer('tag_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
