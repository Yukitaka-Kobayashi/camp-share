<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwArticleListView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 投稿内容の表示用VIEW
        DB::statement( 'DROP VIEW IF EXISTS vw_article_lists' );
        DB::statement( "CREATE VIEW vw_article_lists( 
                        subNo,
                        title, 
                        subType, 
                        nickName,
                        itemName,
                        prefName, 
                        prefName_en, 
                        eventDate, 
                        siteName,
                        siteURL,
                        siteAddress,
                        insertDate,
                        detail,
                        comments,
                        status
                      ) AS
                      SELECT
                        A.subNo,
                        A.title, 
                        CASE WHEN A.subType = 1 THEN '欲しい' WHEN A.subType = 2 THEN 'あげる' END, 
                        A.nickName, 
                        I.itemName, 
                        P.prefName,
                        P.prefName_en,
                        Date_FORMAT(A.eventDate, '%Y/%m/%d'),
                        S.siteName,
                        S.siteURL,
                        S.siteAddress,
                        Date_FORMAT(A.insertDate, '%Y/%m/%d %H:%i:%s'),
                        A.detail,
                        (SELECT count(*) from trn_comment C WHERE A.subNo=C.subNo),
                        CASE WHEN DATEDIFF(CURDATE(), A.eventDate) > 0 THEN '受付終了' ELSE '受付中' END
                      FROM
                        tbl_article AS A 
                        LEFT JOIN
                        trn_comment AS C 
                        ON
                        A.subNo=C.subNo
                          LEFT JOIN
                          mst_pref AS P
                          ON
                          A.fukenCD=P.fukenCD
                    	LEFT JOIN
                          	mst_campsite AS S
                          	ON
                          	A.campSiteID=S.campSiteID
                    	  LEFT JOIN
                          	  mst_item AS I
                          	  ON
                           	  A.itemID=I.itemID
                      GROUP BY A.subNo
                      ORDER BY insertDate DESC
          " );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //ロールバック時
        DB::statement( 'DROP VIEW IF EXISTS vw_article_lists' );        
    }
}
