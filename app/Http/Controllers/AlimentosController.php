<?php

namespace App\Http\Controllers;

use App\Alimento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlimentoRequest;

class AlimentosController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $alimentos = Alimento::orderby('nome')->paginate(10);
        else {
            $alimentos = Alimento::where('nome', 'like', '%'.$filtragem.'%')->orderby("nome")->paginate(10);
        }    
        return view('alimentos.index', ['alimentos'=>$alimentos]);
    }
    public function create(){
        return view('alimentos.create');

    }public function destroy($id) {
        try{
            Alimento::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
        }catch (\Illuminate\Database\QueryException $e){
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
        }catch(\PDOException $e){
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
        }
        return $ret;
        
    }
    public function edit($id) {
        $alimento = Alimento::find($id);
        return view('alimentos.edit', compact('alimento'));
    }
    public function update(AlimentoRequest $request, $id){
        $alimento = Alimento::find($id)->update($request->all());
        return redirect()->route('alimentos');

    }
    public function store(AlimentoRequest $request){
        $novo_alimento = $request->all();
        Alimento::create($novo_alimento);

        return redirect()->route('alimentos');
    }
}
