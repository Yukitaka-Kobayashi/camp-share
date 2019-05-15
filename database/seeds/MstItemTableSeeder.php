<?php

use Illuminate\Database\Seeder;

class MstItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //mst_item用シーダー
        DB::table('mst_item')->insert(
          ['itemID' => '1', 'itemName' => '薪'],
          ['itemID' => '2', 'itemName' => '炭'],
          ['itemID' => '3', 'itemName' => '着火材'],
          ['itemID' => '4', 'itemName' => 'その他']
          );
    }
}
