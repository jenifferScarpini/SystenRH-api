<?php

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Funcionario;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('departamentos', function (Request $request){
    $departamento = new Departamento();
    $departamento->name = $request->input('name');
    $departamento->description = $request->input('description');
    $departamento->save();
    return response()->json($departamento);
});

Route::get('departamentos', function(){
    $departamento = Departamento::all();
    return response()->json($departamento);
});

Route::get('departamentos/funcionarios', function(){
    $departamento = Departamento::with('funcionarios')->get();
    return response()->json($departamento);
});

Route::get('departamentos/{id}', function($id){
    $departamento = Departamento::find($id);
    return response()->json($departamento);
});



Route::patch('/departamentos/{id}',function (Request $request, $id){
    $departamento = Departamento::find($id);
    if($request->input('name') !== null){
        $departamento->name =$request->input('name');
    }
    if($request->input('description') !== null){
        $departamento->description = $request->input('description');
    }

    $departamento->save();
    return response()->json($departamento);
});



Route::delete('departamentos/{id}', function($id){
    $departamento = Departamento::find($id);
    $departamento->delete();
    return response()->json($departamento);

});



Route::get('departamentos/funcionarios/{id}', function($id){
    $departamento = Departamento::find($id);
    $funcionarios = $departamento->funcionarios;

    return response()->json($funcionarios);
});


# funcionário

Route::post('funcionarios', function (Request $request){
    $funcionario = new Funcionario();
    $funcionario->name = $request->input('name');
    $funcionario->departamento_id = $request->input('departamento_id');
    $funcionario->save();
    return response()->json($funcionario);
});

Route::get('funcionarios', function(){
    $funcionario = Funcionario::all();
    return response()->json($funcionario);
});

Route::get('funcionarios/departamentos', function(){
    
    $funcionarios = Funcionario::with('departamento')->get();

    return response()->json($funcionarios);
});


Route::get('funcionarios/{id}', function($id){
    $funcionario = Funcionario::find($id);
    return response()->json($funcionario);
});

Route::patch('/funcionarios/{id}',function (Request $request, $id){
    $funcionario = Funcionario::find($id);
    if($request->input('name') !== null){
        $funcionario->name =$request->input('name');
    }
    if($request->input('departamento_id') !== null){
        $funcionario->departamento_id = $request->input('departamento_id');
    }

    $funcionario->save();
    return response()->json($funcionario);
});

Route::delete('funcionarios/{id}', function($id){
    $funcionario = Funcionario::find($id);
    $funcionario->delete();
    return response()->json($funcionario);

});


Route::get('funcionarios/departamentos/{id}', function($id){
    $funcionario = Funcionario::find($id);
    $departamento = $funcionario->departamento;

    return response()->json($departamento);
});



