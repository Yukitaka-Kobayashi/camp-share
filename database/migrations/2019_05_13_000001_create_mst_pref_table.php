<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstPrefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_pref', function (Blueprint $table) {
            //デフォルトキャラセット
            $table->charset = 'utf8';
            
            //カラム            
            $table->integer('fukenCD')->primary(); //主キー
            $table->text('prefName')->nullable();
            $table->text('prefName_en')->nullable();
            $table->text('prefName_kana')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_pref');
    }
}
