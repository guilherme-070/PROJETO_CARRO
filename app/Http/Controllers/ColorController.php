<?php

namespace App\Http\Controllers;

use App\Models\Color;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $rules = [
        "name" => "required|min:2|max:30|unique:colors",
    ];

    private $messages =[
        "required" => "O campo [:attribute] é obrigatório",
         "unique" => "O campo [:attribute] deve ser único",
        ];
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
        $request->validate($this->rules, $this->messages);

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



}
