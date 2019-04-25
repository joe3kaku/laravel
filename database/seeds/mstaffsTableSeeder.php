<?php

use Illuminate\Database\Seeder;

class mstaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*シーダーでのサンプルデータ作成*/
        DB::table('Staff.mstaffs')->delete();

        $mstaffs = new \App\Mstaff([
          'division_no' => '00000001',
          'staff_id' => '9999900001',
          'staff_name' => 'ウィジェット太郎',
          'officer_flag' => '1'
        ]);
        $mstaffs->save();
        $mstaffs = new \App\Mstaff([
          'division_no' => '00000002',
          'staff_id' => '9999900002',
          'staff_name' => 'ウィジェット二郎',
          'officer_flag' => '1'
        ]);
        $mstaffs->save();
        $mstaffs = new \App\Mstaff([
          'division_no' => '00000003',
          'staff_id' => '9999900003',
          'staff_name' => 'ウィジェット三郎',
          'officer_flag' => '1'
        ]);
        $mstaffs->save();
        $mstaffs = new \App\Mstaff([
          'division_no' => '00000004',
          'staff_id' => '9999900004',
          'staff_name' => 'ウィジェット四郎',
          'officer_flag' => '1'
        ]);
        $mstaffs->save();
        $mstaffs = new \App\Mstaff([
          'division_no' => '00000005',
          'staff_id' => '9999900005',
          'staff_name' => 'ウィジェット五郎',
          'officer_flag' => '1'
        ]);
        $mstaffs->save();

    }
}
