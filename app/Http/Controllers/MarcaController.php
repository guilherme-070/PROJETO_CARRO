<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Marca;
use App\Models\Modelo;

class MarcaController extends Controller
{
    private $rules = [
        "name" => "required|min:2|max:30|unique:marcas",
    ];

    private $messages =[
        "required" => "O campo [:attribute] é obrigatório",
        "unique" => "O campo [:attribute] deve ser único",
        ];
    public function index()
    {
        $data = Marca::with('modelo')->get();
        return view('marca.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate($this->rules, $this->messages);


        $marca = new Marca();
        $marca->name = $request->name;
        $marca->save();

        return redirect()->route('marca.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);

        if(isset($marca)){
            return view('marca.show', compact ('marca'));
        }
        return "<h1>ERRO - MARCA NAO ENCONTRADA</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);

        if(isset($marca)){
            return view('marca.edit', compact('marca'));
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
        $marca = Marca::find($id);

        if(isset($marca)){
            $marca->name = $request->name;
            $marca->save();
            return redirect()->route('marca.index');
        }
        return "<h1>ERRO - MARCA NAO ENCONTRADA</h1>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::find($id);
        if(isset($marca)){
            $marca->delete();
            return  redirect()->route('marca.index');
    }
    }


}
