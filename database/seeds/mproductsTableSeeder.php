<?php

use Illuminate\Database\Seeder;

class mproductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*シーダーでのサンプルデータ作成*/
        DB::table('mproducts')->delete();

        // $products = new \App\Mproduct([
        //   'product_id' => 'A0000001',
        //   'product_name' => '商品A',
        //   'product_val' => '11111'
        // ]);
        // $products->save();
        // $products = new \App\Mproduct([
        //   'product_id' => 'A0000002',
        //   'product_name' => '商品B',
        //   'product_val' => '22222'
        // ]);
        // $products->save();
        // $products = new \App\Mproduct([
        //   'product_id' => 'A0000003',
        //   'product_name' => '商品C',
        //   'product_val' => '33333'
        // ]);
        // $products->save();

        /*Fakerでのサンプルデータ作成*/
        DB::table('mproducts')->delete();

        $faker = Faker::create('ja_JP');

        $product_id = ['00000001','00000002']

        for ($i = 0; $i < 10; $i++) {
          \App\m_products::create([
            'product_id' => $faker->romdomElement($product_id),
            'product_name' => $faker->name(),
            'product_val' => $faker->randomNumber(5)
          ]);
        }
    }
}
