@extends('adminlte::default')

@section('content')

<div class="container-fluid">
    <h3>Alimentos</h3>

    {!! Form::open(['name'=>'form_name', 'route'=>'alimentos']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="filtragem" class="form-control"
                    style="width:100% !important;" placeholder="Pesquisa...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </span>        
        </div>
    </div>
    <br>
    {!! Form::close() !!}


   

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Calorias</th>
                <th>Categoria</th>
                <th>Opções</th>        
            </tr>
            </thead>
            <tbody>
                @foreach($alimentos as $hab)
                    <tr>
                        <td>{{$hab->id}}</td>
                        <td>{{$hab->nome}}</td>
                        <td>{{$hab->descricao}}</td>
                        <td>{{$hab->calorias}}</td>
                        <td>{{$hab->categoria_id}}</td>
                        <td>
                            <a href="{{route('alimentos.edit', ['id'=>$hab->id]) }}"
                                        class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$hab->id}})"
                                        class="btn-sm btn-danger">Remover</a>
                        
                        
                        </td> 
                @endforeach                         
                    </tr>
            </tbody>  
        </table>
        {{$alimentos->links()}}
        <br>
        <a href="{{ route('alimentos.create') }}" class="btn btn-info">Novo</a>
        <!-- <a href="{{ route('habitos.relatorio') }}" class="btn btn-success">Gera PDF</a> -->
    </div>       
@endsection
@section('table-delete')
"alimentos"
@endsection