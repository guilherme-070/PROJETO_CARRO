<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modelos = [

            ['name' => 'Corolla', 'marca_id' => 1],
            ['name' => 'Camry', 'marca_id' => 1],
            ['name' => 'Prius', 'marca_id' => 1],
            ['name' => 'Hilux', 'marca_id' => 1],
            ['name' => 'Golf', 'marca_id' => 2],
            ['name' => 'Passat', 'marca_id' => 2],
            ['name' => 'Tiguan', 'marca_id' => 2],
            ['name' => 'Jetta', 'marca_id' => 2],
            ['name' => 'Mustang', 'marca_id' => 3],
            ['name' => 'F-150', 'marca_id' => 3],
            ['name' => 'Focus', 'marca_id' => 3],
            ['name' => 'Fiesta', 'marca_id' => 3],
            ['name' => 'Civic', 'marca_id' => 4],
            ['name' => 'Accord', 'marca_id' => 4],
            ['name' => 'Fit', 'marca_id' => 4],
            ['name' => 'HR-V', 'marca_id' => 4],
            ['name' => 'Cruze', 'marca_id' => 5],
            ['name' => 'Malibu', 'marca_id' => 5],
            ['name' => 'Onix', 'marca_id' => 5],
            ['name' => 'Trailblazer', 'marca_id' => 5],
            ['name' => 'Classe C', 'marca_id' => 6],
            ['name' => 'Classe E', 'marca_id' => 6],
            ['name' => 'Classe G', 'marca_id' => 6],
            ['name' => 'GLA', 'marca_id' => 6],
            ['name' => 'Série 3', 'marca_id' => 7],
            ['name' => 'Série 5', 'marca_id' => 7],
            ['name' => 'X1', 'marca_id' => 7],
            ['name' => 'X5', 'marca_id' => 7],
            ['name' => 'A3', 'marca_id' => 8],
            ['name' => 'A4', 'marca_id' => 8],
            ['name' => 'Q5', 'marca_id' => 8],
            ['name' => 'R8', 'marca_id' => 8],
            ['name' => 'Sentra', 'marca_id' => 9],
            ['name' => 'Altima', 'marca_id' => 9],
            ['name' => 'Versa', 'marca_id' => 9],
            ['name' => 'Kicks', 'marca_id' => 9],
            ['name' => 'HB20', 'marca_id' => 10],
            ['name' => 'Tucson', 'marca_id' => 10],
            ['name' => 'Creta', 'marca_id' => 10],
            ['name' => 'Elantra', 'marca_id' => 10],
            ['name' => 'Sorento', 'marca_id' => 11],
            ['name' => 'Sportage', 'marca_id' => 11],
            ['name' => 'Cerato', 'marca_id' => 11],
            ['name' => 'Soul', 'marca_id' => 11],
            ['name' => 'Toro', 'marca_id' => 12],
            ['name' => 'Argo', 'marca_id' => 12],
            ['name' => 'Strada', 'marca_id' => 12],
            ['name' => 'Cronos', 'marca_id' => 12]
        ];

        DB::table('modelos')->insert($modelos);
    }
}
