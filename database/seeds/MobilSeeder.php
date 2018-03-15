<?php

use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mobil= [
        ['fotomobil'=>'sampel1.jpg', 'merk'=>'Honda Brio', 'plat_no'=>'D 123 SPL', 'spesifikasi'=>'max penumpang 5, dual AC','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel2.jpg', 'merk'=>'Honda Brio', 'plat_no'=>'D 123 DD', 'spesifikasi'=>'max penumpang 5, dual AC','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel4.png', 'merk'=>'Honda Brio', 'plat_no'=>'D 123 DAC', 'spesifikasi'=>'max penumpang 5, dual AC','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel5.png', 'merk'=>'Honda Brio', 'plat_no'=>'D 123 GAC', 'spesifikasi'=>'max penumpang 5, dual AC','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel6.png', 'merk'=>'Honda Brio', 'plat_no'=>'D 444 HHA', 'spesifikasi'=>'max penumpang 5, dual AC','harga_sewamobil'=>'150000', 'status'=>'Tidak'],
        ['fotomobil'=>'sampel3.png', 'merk'=>'Suzuki Ertiga', 'plat_no'=>'D 909 BFF', 'spesifikasi'=>'max penumpang 7, dual AC','harga_sewamobil'=>'200000', 'status'=>'Tidak'],
        ];

        DB::table('mobils')->insert($mobil);
    }
}
