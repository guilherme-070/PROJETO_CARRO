<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            ['name' => 'Toyota'],
            ['name' => 'Volkswagen'],
            ['name' => 'Ford'],
            ['name' => 'Honda'],
            ['name' => 'Chevrolet'],
            ['name' => 'Mercedes-Benz'],
            ['name' => 'BMW'],
            ['name' => 'Audi'],
            ['name' => 'Nissan'],
            ['name' => 'Hyundai'],
            ['name' => 'Kia'],
            ['name' => 'Porsche'],
            ['name' => 'Ferrari'],
            ['name' => 'Lamborghini'],
            ['name' => 'Jaguar'],
            ['name' => 'Land Rover'],
            ['name' => 'Peugeot'],
            ['name' => 'Renault'],
            ['name' => 'Fiat'],
            ['name' => 'Mazda'],
            ['name' => 'Subaru'],
            ['name' => 'Mitsubishi'],
            ['name' => 'Volvo'],
            ['name' => 'Lexus'],
            ['name' => 'Jeep'],
            ['name' => 'Dodge'],
            ['name' => 'Ram'],
            ['name' => 'Chrysler'],
            ['name' => 'Tesla'],
            ['name' => 'Bentley'],
            ['name' => 'Rolls-Royce'],
            ['name' => 'Bugatti'],
            ['name' => 'Maserati'],
            ['name' => 'Aston Martin'],
            ['name' => 'Alfa Romeo'],
            ['name' => 'Citroën'],
            ['name' => 'Acura'],
            ['name' => 'Infiniti'],
            ['name' => 'Pagani'],
            ['name' => 'McLaren'],
            ['name' => 'Suzuki'],
            ['name' => 'Seat'],
            ['name' => 'Skoda'],
            ['name' => 'GMC'],
            ['name' => 'Buick'],
            ['name' => 'Opel'],
            ['name' => 'Saab'],
            ['name' => 'Hummer'],
            ['name' => 'Mini'],
            ['name' => 'Scion'],
            ['name' => 'Smart'],
            ['name' => 'Fisker'],
            ['name' => 'Koenigsegg'],
        ];

        DB::table('marcas')->insert($marcas);
    }
}
