<?php

namespace App\Http\Controllers;

use App\Nivel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NivelRequest;

class NivelController extends Controller
{
    public function index(Request $filtro){
        $filtragem = $filtro->get('filtragem');
        if($filtragem == null)
            $nivels = Nivel::orderby('nome')->paginate(10);
        else {
            $nivels = Nivel::where('nome', 'like', '%'.$filtragem.'%')->orderby("nome")->paginate(10);
        }    
        return view('nivels.index', ['nivels'=>$nivels]);
    }
    public function create(){
        return view('nivels.create');

    }public function destroy($id) {
        try{
            Nivel::find($id)->delete();
            $ret = array('status'=>'ok', 'msg'=>"null");
        }catch (\Illuminate\Database\QueryException $e){
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
        }catch(\PDOException $e){
            $ret = array('status'=>'erro', 'msg'=>$e->getMessage());
        }
        return $ret;
        
    }
    public function edit($id) {
        $nivel = Nivel::find($id);
        return view('nivels.edit', compact('nivel'));
    }
    public function update(NivelRequest $request, $id){
        $nivel = Nivel::find($id)->update($request->all());
        return redirect()->route('nivels');

    }
    public function store(NivelRequest $request){
        $novo_nivel = $request->all();
        Nivel::create($novo_nivel);

        return redirect()->route('nivels');
    }
}
