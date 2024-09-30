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
    public function graph(){

        $carro = Marca::with('modelo')->orderBy('name')->get();
        


           $data= [
            ["MARCA", "NÚMERO DE MODELOS"],
           ];
           $cont =1;
           foreach($carro as $item){
                $data[$cont] = [
                    $item->name, count($item->modelo)
                ];
                $cont++;
           }
           $data = json_encode($data);

        //    $cores = Color::with('carro')->orderBy('name')->get();

        //    $cdata= [
        //     ["MARCA", "NÚMERO DE MODELOS"],
        //    ];
        //    $cont =1;
        //    foreach($cores as $item){
        //         $cdata[$cont] = [
        //             $item->name, count($item->carro)
        //         ];
        //         $cont++;
        //    }
        //    $cdata = json_encode($cdata);
           
           /*$carrosPorCor = Carro::with('color') // Supondo que a relação com a cor está definida
            ->select('color_id', DB::raw('count(*) as total'))
            ->groupBy('color_id')
            ->get();

        $dataCor = [
            ["COR", "NÚMERO DE CARROS"],
        ];
        foreach ($carrosPorCor as $item) {
            $cor = Color::find($item->color_id); // Supondo que você tem uma relação de cores
            if ($cor) {
                $dataCor[] = [
                    $cor->name, $item->total
                ];
            }
        }
        $dataCor = json_encode($dataCor);*/

           

        return view('home', compact(['data']));

    }

}
