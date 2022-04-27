<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapa;

class MapasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mapa::truncate();
        $csvData = fopen(base_path('database/csv/mapas.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ';')) !== false) {
            if (!$transRow) {
                Mapa::create([
                    'sgLinha' => $data['0'],
                    'codigoLinha' => $data['1'],
                    'getOrigemIda' => $data['2'],
                    'destinoIda' => $data['3'],
                    'nomeLinha' => $data['4'],
                    'mapa' => $data['5']
                    
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }

    
}
