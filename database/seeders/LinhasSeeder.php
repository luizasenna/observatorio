<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Linha;

class LinhasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Linha::truncate();
        $csvData = fopen(base_path('database/csv/linhas.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ';')) !== false) {
            if (!$transRow) {
                Linha::create([
                    'sgLinha' => $data['0'],
                    'codigoLinha' => $data['1'],
                    'getOrigemIda' => $data['2'],
                    'destinoIda' => $data['3'],
                    'nomeLinha' => $data['4']
                    
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }

    
}
