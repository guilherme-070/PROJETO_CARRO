<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['name' => 'Vermelho'],
            ['name' => 'Azul'],
            ['name' => 'Verde'],
            ['name' => 'Amarelo'],
            ['name' => 'Laranja'],
            ['name' => 'Roxo'],
            ['name' => 'Rosa'],
            ['name' => 'Marrom'],
            ['name' => 'Cinza'],
            ['name' => 'Preto'],
            ['name' => 'Branco'],
            ['name' => 'Bege'],
            ['name' => 'Vinho'],
            ['name' => 'Dourado'],
            ['name' => 'Prata'],
            ['name' => 'Turquesa'],
            ['name' => 'Salmon'],
            ['name' => 'Lilas'],
            ['name' => 'Magenta'],
            ['name' => 'Ciano'],
            ['name' => 'Esmeralda'],
            ['name' => 'Mostarda'],
            ['name' => 'Caramelo'],
            ['name' => 'Azeitona'],
            ['name' => 'Bordô'],
            ['name' => 'Fúcsia'],
            ['name' => 'Grafite'],
            ['name' => 'Pêssego'],
            ['name' => 'Marfim'],
            ['name' => 'Lavanda']
        ];

        DB::table('colors')->insert($colors);
    }
}
