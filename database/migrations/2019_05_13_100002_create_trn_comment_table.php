<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrnCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trn_comment', function (Blueprint $table) {
            //デフォルトキャラセット
            $table->charset = 'utf8';
            
            //カラム            
            $table->integer('subNo');
            $table->integer('subBr');
            $table->timestamp('comDate');
            $table->text('nickName')->nullable();
            $table->text('comment')->nullable();
            $table->timestamp('subDate');
            $table->text('filefullpath');   //20290514山口追加
            $table->text('rsv1');   //20290514山口追加
            $table->text('rsv2');   //20290514山口追加
            $table->text('rsv3');   //20290514山口追加
            //キー設定
            $table->primary(['subNo', 'subBr']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trn_comment');
    }
}
