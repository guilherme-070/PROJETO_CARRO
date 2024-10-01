<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Estado;
use App\Models\Color;
use App\Models\Carro;

class HomeController extends Controller
{
    public function graph()
    {
        // Obtendo as marcas com seus respectivos modelos
        $marca = Marca::with('modelo')->orderBy('name')->get();  // Certifique-se de que o relacionamento 'modelos' está correto

        $data= [
            ["MARCA", "NÚMERO DE MODELOS"],
           ];
           $cont =1;
           foreach($marca as $item){
                $data[$cont] = [
                    $item->name, count($item->modelo)
                ];
                $cont++;
           }
           $data = json_encode($data);

        // Obtendo os carros com suas respectivas cores
        $color = Color::with('carros')->orderBy('name')->get();  // Certifique-se de que o relacionamento 'color' está correto

        $datacolors = [
            ["PLACA", "COR"],
        ];
        $cont = 1;
        foreach ($color as $item) {
            $datacolors[$cont] = [
                $item->name, count($item->carros) // Exibindo o nome da cor associada ao carro
            ];
            $cont++;
        }
        $datacolors = json_encode($datacolors);

        return view('home', compact(['data', 'datacolors']));
    }
}
