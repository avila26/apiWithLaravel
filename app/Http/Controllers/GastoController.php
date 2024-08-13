<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function buscar(Request $request)
    {   
        $gastos= DB::table('gastos')
        ->join('categorias', 'gastos.categorias_id', '=', 'categorias.id')

        ->select('gastos.id','gastos.descripcion','gastos.monto','gastos.fechaTransaccion','categorias.nombre as categoria')
        ->where('gastos.fechaTransaccion','LIKE','%'.$request->buscar.'%')
        ->get();        
        return response()->json([
            'busqueda'=>$gastos
        ]);
    }

//Me trae la lista de todos los gastos con su tipo de categoria
    public function gastosCategoria()
    {
       $categorias= DB::table('categorias')
        ->join('gastos','gastos.categorias_id','=','categorias.id')
        ->select('gastos.id','gastos.descripcion','gastos.monto','gastos.fechaTransaccion','categorias.nombre as categoria')
        ->orderBy('categorias.id')
        ->get();
        return response()->json(['categorias'=>$categorias]);
    }

//Me guarda todos los atributos 
    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'descripcion'=>'required',
            'monto'=>'required|gte:1',
            'fechaTransaccion'=>'required|date',
            'categorias_id'=>'required'
        ],[
            'descripcion.required'=>'Campo descripcion es requerido',
            'monto.required'=>'Campo monto requerido',
            'monto.gte'=>'El monto debe ser de almenos 1',
            'fechaTransaccion.required'=>'Campo fecha Transaccion requerido',
            'categorias_id.required'=>'Campo categoria requerido'
        ]);
        if($validate->fails()){
            return response()->json([
                'error'=>$validate->errors()
            ]);
        }
        $gasto=Gasto::create($request->all());
        return response()->json(["gasto"=>$gasto]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gasto $gasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gasto $gasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gasto $gasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gasto $gasto)
    {
        //
    }
}
