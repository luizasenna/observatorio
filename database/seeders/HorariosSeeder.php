<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::truncate();
        $csvData = fopen(base_path('database/csv/horarios.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ';')) !== false) {
            if (!$transRow) {
                Horario::create([
                    'sgLinha' => $data['0'],
                    'horario' => $data['1']

                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }


}
