<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MprodctsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*シーダーでのサンプルデータ作成*/
        // DB::table('mproducts')->delete();
        //
        // $products = new \App\Mproduct([
        //   'product_id' => 'A0000001',
        //   'product_name' => '商品A',
        //   'product_val' => '11111',
        //   'insert_date' => now()
        // ]);
        // $products->save();
        // $products = new \App\Mproduct([
        //   'product_id' => 'A0000002',
        //   'product_name' => '商品B',
        //   'product_val' => '22222',
        //   'insert_date' => now()
        // ]);
        // $products->save();
        // $products = new \App\Mproduct([
        //   'product_id' => 'A0000003',
        //   'product_name' => '商品C',
        //   'product_val' => '33333',
        //   'insert_date' => now()
        // ]);
        // $products->save();

        /*Fakerでのサンプルデータ作成*/
        DB::table('mproducts')->delete();


        require_once 'vendor/fzaninotto/faker/src/autoload.php';
        $faker = Faker\Factory::create('ja_JP');

        $dt = Carbon::now();
        $dt->SetTimeZone('Asia/Tokyo');

        for ($i = 0; $i < 100; $i++) {
          \App\Mproduct::create([
            'product_id' => $faker->regexify('[0-9]{8}'),
            'product_name' => $faker->name(),
            'product_val' => $faker->randomNumber(5),
            'insert_date' => $dt->format('Y/m/d H:i:s'),
          ]);
        }

    }
}
