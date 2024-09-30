<?php

namespace App\Http\Controllers;

use App\Models\Color;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Color::All();
        return view('color.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $color = new Color();
        $color->name = $request->name;
        $color->save();

        return redirect()->route('color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = Color::find($id);

        if(isset($color)){
            return view('color.show', compact ('color'));
        }
        return "<h1>ERRO - COR NAO ENCONTRADA</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);

        if(isset($color)){
            return view('color.edit', compact('color'));
        }
        return "<h1>ERRO - COR NAO ENCONTRADA</h1>";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $color = Color::find($id);

        if(isset($color)){
            $color->name = $request->name;
            $color->save();
            return redirect()->route('color.index');
        }
        return "<h1>ERRO - COR NAO ENCONTRADA</h1>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        if(isset($color)){
            $color->delete();
            return  redirect()->route('color.index');
        }
    }

    public function graph(){

        $carro = Color::with('carro')->orderBy('modelo-id')->get();
        //marcas
           $colordata= [
            ["CARRO", "NÚMERO DE CORES"],
           ];
           $cont =1;
           foreach($carro as $item){
                $data[$cont] = [
                    $item->name, count($item->carro)
                ];
                $cont++;
           }
           $colordata = json_encode($colordata);

           /*$datacolors= [
            ["MARCA", "NÚMERO DE MODELOS"],
           ];
           $cont =1;
           foreach($color as $item){
                $datacolors[$cont] = [
                    $item->name, count($item->carro)
                ];
                $cont++;
           }
           $datacolors = json_encode($datacolors);*/

        return view('home', compact(['colordata']));
    
}
}
