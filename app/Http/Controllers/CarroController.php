<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Estado;
use App\Models\Color;
use Dompdf\Dompdf;

use Illuminate\Http\Request;

class CarroController extends Controller
{

    //qualque coisa alterada
    private $rules = [
        "placa"=>"required|min:8|max:8|unique:carros",
    ];

    private $messages =[
        "required" => "O campo [:attribute] é obrigatório",
        "unique" => "A placa deve ser única",
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carro::with(['modelos', 'colors', 'estados'])->get();

        return view('carro.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelos = Modelo::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $estados = Estado::orderBy('name')->get();


        return view('carro.create', compact(['modelos', 'colors', 'estados']));
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


            // Cria uma nova instância do modelo Carro
            $carro = new Carro();
            $carro->placa = mb_strtoupper($request->placa, 'UTF-8');

            $modelo = Modelo::find($request->modelo);
            $color = Color::find($request->color);
            $estado = Estado::find($request->estado);

            // Associa os objetos encontrados ao carro
            $carro->modelos()->associate($modelo);
            $carro->estados()->associate($estado);
            $carro->colors()->associate($color);

            // Salva o carro no banco de dados
            $carro->save();

            // Redireciona para a página de listagem de carros
            return redirect()->route('carro.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = Carro::find($id);

        if(isset($carro)){
            return view('carro.show', compact('carro'));
        }
        return "<h1>ERRO - CARRO NAO ENCONTRADO</h1>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carro = Carro::find($id);
        $modelo = Modelo::orderBy('name')->get();
        $color = Color::orderBy('name')->get();
        $estado = Estado::orderBy('name')->get();

        if(isset($carro)){
            return view('carro.edit', compact (['carro', 'modelo', 'color', 'estado']));
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
        $this->validate($request, $this->rules, $this->messages);

        $carro = Carro::find($id);
        $modelo = Modelo::find($request->modelo);
        $estado = Estado::find($request->estado);
        $color = Color::find($request->color);

        if(isset($carro) && isset($modelo) && isset($estado) && isset($color)){

            $carro->placa = mb_strtoupper($request->placa, 'UTF-8');
            $carro->modelos()->associate($modelo);
            $carro->estados()->associate($estado);
            $carro->colors()->associate($color);
            $carro->save();

           return redirect()->route('carro.index');
        }

        return "<h1>ERRO - CARRO NAO ENCONTRADO</h1>";


        /*$modelo =Modelo::find($id);
        $marca = Marca::find($request->marca);

        if(isset($marca) && isset($modelo)){
           $modelo->name = mb_strtoupper($request->name, 'UTF-8');
           $modelo->marca()->associate($marca);
           $modelo->save();

           return redirect()->route('modelo.index');
        }

        return "<h1>ERRO - MODELO NAO ENCONTRADO</h1>";*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = Carro::find($id);
        if(isset($carro)){
            $carro->delete();
            return redirect()->route('carro.index');

        }

        return "<h1>ERRO - CARRO NAO ENCONTRADO</h1>";
    }

    public function report(){

        $carros = Carro::with(['modelos', 'colors', 'estados'])->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('carro.report',compact('carros')));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("relatorio-de-carros.pdf", array("Attachment" => false));


    }
}
