<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstCampsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_campsite', function (Blueprint $table) {
            //デフォルトキャラセット
            $table->charset = 'utf8';
            
            //カラム            
            $table->integer('campSiteID')->primary(); //主キー
            $table->integer('fukenCD')->nullable();
            $table->text('siteName')->nullable();
            $table->text('siteURL')->nullable();
            $table->text('siteAddress')->nullable();
            $table->timestamp('registrateDate')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_campsite');
    }
}
