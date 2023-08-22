<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('barangays')->delete();

        $barangays = [           
            'A. Bonifacio (Tinurilan)',
            'Abad Santos (Kambal)',
            'Aguinaldo (Lipata Dako)',
            'Antipolo',
            'Aquino (Imelda)',
            'Bical',
            'Beguin',
            'Bonga',
            'Butag',
            'Cadandanan',
            'Calomagon',
            'Calpi',
            'Cocok-Cabitan',
            'Daganas',
            'Danao',
            'Dolos',
            'E. Quirino (Pinangomhan)',
            'Fabrica',
            'G. Del Pilar (Tanga)',
            'Gate',
            'Inararan',
            'J. Gerona (Biton)',
            'J.P. Laurel (Pon-od)',
            'Jamorawon',
            'Libertad (Calle Putol)',
            'Lajong',
            'Magsaysay (Bongog)',
            'Managa-naga',
            'Marinab',
            'Nasuje',
            'Montecalvario',
            'N. Roque (Calayugan)',
            'Namo',
            'Obrero',
            'Osmeña (Lipata Saday)',
            'Otavi',
            'Padre Diaz',
            'Palale',
            'Quezon (Cabarawan)',
            'R. Gerona (Inalapan)',
            'Recto',
            'Roxas (Busay)',
            'Sagrada',
            'San Francisco (Polot)',
            'San Isidro (Cabugaan)',
            'San Juan Bag-o',
            'San Juan Daan',
            'San Rafael (Togbongon)',
            'San Ramon',
            'San Vicente',
            'Santa Remedios',
            'Santa Teresita (Trece)',
            'Sigad',
            'Somagongsong',
            'Taromata',
            'Zone 1 (Ilawod)',
            'Zone 2 (Sabang)',
            'Zone 3 (Central)',
            'Zone 4 (Central Business District)',
            'Zone 5 (Canipaan)',
            'Zone 6 (Baybay)',
            'Zone 7 (Iraya)',
            'Zone 8 (Loyo)',
        ];

        $data = [];

        foreach($barangays as $value) {

            DB::table('barangays')->insert([
                'name' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
