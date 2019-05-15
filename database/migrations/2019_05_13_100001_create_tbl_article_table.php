<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_article', function (Blueprint $table) {
            //デフォルトキャラセット
            $table->charset = 'utf8';
            
            //カラム            
            $table->integer('subNo')->autoIncrement()->primary(); //主キー
            $table->timestamp('eventDate')->nullable($value = true);
            $table->integer('subType')->nullable();
            $table->integer('itemID')->nullable();
            $table->text('title')->nullable();
            $table->text('detail')->nullable();
            $table->text('nickName')->nullable();
            $table->text('email')->nullable();
            $table->integer('campSiteID')->nullable();
            $table->integer('fukenCD')->nullable();
            $table->timestamp('insertDate')->nullable($value = true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_article');
    }
}
