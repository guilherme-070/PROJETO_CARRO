<?php

namespace App\Http\Controllers;


use App\Models\Modelo;
use App\Models\Marca;

use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modelo::with(['marca'])->get();
        return view('modelo.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::orderBy('name')->get();
        return view('modelo.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = Marca::find($request->marca);

        if(isset($marca)){
           $modelo = new Modelo();
           $modelo->name = mb_strtoupper($request->name, 'UTF-8');

           $modelo->marca()->associate($marca);


           $modelo->save();

           return redirect()->route('modelo.index');
        }

        return "<h1>ERRO - EIXO NAO ENCONTRADO</h1>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo::find($id);

        if(isset($modelo)){
            return view('modelo.show', compact('modelo'));
        }
        return "<h1>ERRO - EIXO NAO ENCONTRADO</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Modelo::find($id);
        $marcas = Marca::orderBy('name')->get();

        if(isset($modelo)){
            return view('modelo.edit', compact (['modelo', 'marcas']));
        }
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
        $modelo =Modelo::find($id);
        $marca = Marca::find($request->marca);

        if(isset($marca) && isset($modelo)){
           $modelo->name = mb_strtoupper($request->name, 'UTF-8');
           $modelo->marca()->associate($marca);
           $modelo->save();

           return redirect()->route('modelo.index');
        }

        return "<h1>ERRO - MODELO NAO ENCONTRADO</h1>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelo = Modelo::find($id);
        if(isset($modelo)){
            $modelo->delete();
            return redirect()->route('modelo.index');
        }

        return "<h1>ERRO - MODELO NAO ENCONTRADO</h1>";
    }
}
