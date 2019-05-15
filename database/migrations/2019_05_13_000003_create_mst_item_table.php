<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_item', function (Blueprint $table) {
            //デフォルトキャラセット
            $table->charset = 'utf8';
            
            //カラム            
            $table->integer('itemID')->primary(); //主キー
            $table->text('itemName')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_item');
    }
}
