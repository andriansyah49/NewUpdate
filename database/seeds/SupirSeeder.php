<?php

use Illuminate\Database\Seeder;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supir= [
        ['namasupir'=>'-', 'jksupir'=>'-', 'fotosupir'=>'-', 'no_identitassupir'=>'0','no_hpsupir'=>'0','alamatsupir'=>'-','harga_sewasupir'=>'0','status'=>'Tidak','i'=>'tidak'],
        ['namasupir'=>'Deden Supriatna', 'jksupir'=>'Laki-laki', 'fotosupir'=>'samplesupir1.jpg', 'no_identitassupir'=>'1003291828718089','no_hpsupir'=>'089324528812','alamatsupir'=>'Bandung','harga_sewasupir'=>'50000','status'=>'Belum','i'=>'ya'],
        ['namasupir'=>'Robi Permana', 'jksupir'=>'Laki-laki', 'fotosupir'=>'samplesupir1.jpg', 'no_identitassupir'=>'1000983736388883','no_hpsupir'=>'089123876354','alamatsupir'=>'Bandung','harga_sewasupir'=>'50000','status'=>'Belum','i'=>'ya'],
        ];

        DB::table('supirs')->insert($supir);

    }
}
