<?php

use Illuminate\Database\Seeder;

class MstPrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //mst_pref用シーダー
        DB::table('mst_pref')->insert(
            ['fukenCD' => '1', 'prefName' => '北海道', 'prefName_en' => 'Hokkaido', 'prefName_kana' => 'ホッカイドウ'],
            ['fukenCD' => '2', 'prefName' => '青森県', 'prefName_en' => 'Aomori', 'prefName_kana' => 'アオモリケン'],
            ['fukenCD' => '3', 'prefName' => '岩手県', 'prefName_en' => 'Iwate', 'prefName_kana' => 'イワテケン'],
            ['fukenCD' => '4', 'prefName' => '宮城県', 'prefName_en' => 'Miyagi', 'prefName_kana' => 'ミヤギケン'],
            ['fukenCD' => '5', 'prefName' => '秋田県', 'prefName_en' => 'Akita', 'prefName_kana' => 'アキタケン'],
            ['fukenCD' => '6', 'prefName' => '山形県', 'prefName_en' => 'Yamagata', 'prefName_kana' => 'ヤマガタケン'],
            ['fukenCD' => '7', 'prefName' => '福島県', 'prefName_en' => 'Fukushima', 'prefName_kana' => 'フクシマケン'],
            ['fukenCD' => '8', 'prefName' => '茨城県', 'prefName_en' => 'Ibaraki', 'prefName_kana' => 'イバラキケン'],
            ['fukenCD' => '9', 'prefName' => '栃木県', 'prefName_en' => 'Tochigi', 'prefName_kana' => 'トチギケン'],
            ['fukenCD' => '10', 'prefName' => '群馬県', 'prefName_en' => 'Gunma', 'prefName_kana' => 'グンマケン'],
            ['fukenCD' => '11', 'prefName' => '埼玉県', 'prefName_en' => 'Saitama', 'prefName_kana' => 'サイタマケン'],
            ['fukenCD' => '12', 'prefName' => '千葉県', 'prefName_en' => 'Chiba', 'prefName_kana' => 'チバケン'],
            ['fukenCD' => '13', 'prefName' => '東京都', 'prefName_en' => 'Tokyo', 'prefName_kana' => 'トウキョウト'],
            ['fukenCD' => '14', 'prefName' => '神奈川県', 'prefName_en' => 'Kanagawa', 'prefName_kana' => 'カナガワケン'],
            ['fukenCD' => '15', 'prefName' => '新潟県', 'prefName_en' => 'Niigata', 'prefName_kana' => 'ニイガタケン'],
            ['fukenCD' => '16', 'prefName' => '富山県', 'prefName_en' => 'Toyama', 'prefName_kana' => 'トヤマケン'],
            ['fukenCD' => '17', 'prefName' => '石川県', 'prefName_en' => 'Ishimaka', 'prefName_kana' => 'イシカワケン'],
            ['fukenCD' => '18', 'prefName' => '福井県', 'prefName_en' => 'Fukui', 'prefName_kana' => 'フクイケン'],
            ['fukenCD' => '19', 'prefName' => '山梨県', 'prefName_en' => 'Yamanashi', 'prefName_kana' => 'ヤマナシケン'],
            ['fukenCD' => '20', 'prefName' => '長野県', 'prefName_en' => 'Nagano', 'prefName_kana' => 'ナガノケン'],
            ['fukenCD' => '21', 'prefName' => '岐阜県', 'prefName_en' => 'Gifu', 'prefName_kana' => 'ギフケン'],
            ['fukenCD' => '22', 'prefName' => '静岡県', 'prefName_en' => 'Shizuoka', 'prefName_kana' => 'シズオカケン'],
            ['fukenCD' => '23', 'prefName' => '愛知県', 'prefName_en' => 'Aichi', 'prefName_kana' => 'アイチケン'],
            ['fukenCD' => '24', 'prefName' => '三重県', 'prefName_en' => 'Mie', 'prefName_kana' => 'ミエケン'],
            ['fukenCD' => '25', 'prefName' => '滋賀県', 'prefName_en' => 'Shiga', 'prefName_kana' => 'シガケン'],
            ['fukenCD' => '26', 'prefName' => '京都府', 'prefName_en' => 'Kyoto', 'prefName_kana' => 'キョウトフ'],
            ['fukenCD' => '27', 'prefName' => '大阪府', 'prefName_en' => 'Osaka', 'prefName_kana' => 'オオサカフ'],
            ['fukenCD' => '28', 'prefName' => '兵庫県', 'prefName_en' => 'Hyogo', 'prefName_kana' => 'ヒョウゴケン'],
            ['fukenCD' => '29', 'prefName' => '奈良県', 'prefName_en' => 'Nara', 'prefName_kana' => 'ナラケン'],
            ['fukenCD' => '30', 'prefName' => '和歌山県', 'prefName_en' => 'Wakayama', 'prefName_kana' => 'ワカヤマケン'],
            ['fukenCD' => '31', 'prefName' => '鳥取県', 'prefName_en' => 'Tottori', 'prefName_kana' => 'トットリケン'],
            ['fukenCD' => '32', 'prefName' => '島根県', 'prefName_en' => 'Shimane', 'prefName_kana' => 'シマケネン'],
            ['fukenCD' => '33', 'prefName' => '岡山県', 'prefName_en' => 'Okayama', 'prefName_kana' => 'オカヤマケン'],
            ['fukenCD' => '34', 'prefName' => '広島県', 'prefName_en' => 'Hiroshima', 'prefName_kana' => 'ヒロシマケン'],
            ['fukenCD' => '35', 'prefName' => '山口県', 'prefName_en' => 'Yamaguchi', 'prefName_kana' => 'ヤマグチケン'],
            ['fukenCD' => '36', 'prefName' => '徳島県', 'prefName_en' => 'Tokushima', 'prefName_kana' => 'トクシマケン'],
            ['fukenCD' => '37', 'prefName' => '香川県', 'prefName_en' => 'Kagawa', 'prefName_kana' => 'カガワケン'],
            ['fukenCD' => '38', 'prefName' => '愛媛県', 'prefName_en' => 'Ehime', 'prefName_kana' => 'エヒメケン'],
            ['fukenCD' => '39', 'prefName' => '高知県', 'prefName_en' => 'Kouchi', 'prefName_kana' => 'コウチケン'],
            ['fukenCD' => '40', 'prefName' => '福岡県', 'prefName_en' => 'Fukuoka', 'prefName_kana' => 'フクオカケン'],
            ['fukenCD' => '41', 'prefName' => '佐賀県', 'prefName_en' => 'Saga', 'prefName_kana' => 'サガケン'],
            ['fukenCD' => '42', 'prefName' => '長崎県', 'prefName_en' => 'Nagasaki', 'prefName_kana' => 'ナガサキケン'],
            ['fukenCD' => '43', 'prefName' => '熊本県', 'prefName_en' => 'Kumamoto', 'prefName_kana' => 'クマモトケン'],
            ['fukenCD' => '44', 'prefName' => '大分県', 'prefName_en' => 'Oita', 'prefName_kana' => 'オオイタケン'],
            ['fukenCD' => '45', 'prefName' => '宮崎県', 'prefName_en' => 'Miyazaki', 'prefName_kana' => 'ミヤザキケン'],
            ['fukenCD' => '46', 'prefName' => '鹿児島県', 'prefName_en' => 'Kagoshima', 'prefName_kana' => 'カゴシマケン'],
            ['fukenCD' => '47', 'prefName' => '沖縄県', 'prefName_en' => 'Okinawa', 'prefName_kana' => 'オキナワケン']
          );
    }
}
