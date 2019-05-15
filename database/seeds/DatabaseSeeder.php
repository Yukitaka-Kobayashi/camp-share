<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // 薪シェアマスタ用Seeder
        $this->call(MstPrefTableSeeder::class);
        $this->call(MstItemTableSeeder::class);
        $this->call(MstCampsiteTableSeeder::class);
    }
}
