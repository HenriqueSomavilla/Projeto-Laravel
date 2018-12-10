@extends('adminlte::default')

@section('content')

<div class="container-fluid">
    <h3>Hábitos</h3>

    {!! Form::open(['name'=>'form_name', 'route'=>'habitos']) !!}
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
                <th>Tipo</th>
                <th>Nível</th>
                <th>Ação</th>          
            </tr>
            </thead>
            <tbody>
                @foreach($habitos as $hab)
                    <tr>
                        <td>{{$hab->id}}</td>
                        <td>{{$hab->nome}}</td>
                        <td>{{$hab->descricao}}</td>
                            @if ($hab->tp_habito == 'B')
                                <td>Bom</td>
                            @elseif ($hab->tp_habito == 'R')
                                <td>Ruim</td>  
                            @endif

                            @if ($hab->nivel_id == 1)
                                <td>Leve</td>
                            @elseif ($hab->nivel_id == 2)
                                <td>Moderado</td>
                            @elseif ($hab->nivel_id == 3)
                                <td>Alto</td>
                            @endif               
                        <td>
                            <a href="{{route('habitos.edit', ['id'=>$hab->id]) }}"
                                        class="btn-sm btn-success">Editar</a>
                            <a href="#" onClick="return ConfirmaExclusao({{$hab->id}})"
                                        class="btn-sm btn-danger">Remover</a>
                        
                        
                        </td> 
                @endforeach                         
                    </tr>
            </tbody>  
        </table>
        {{$habitos->links()}}
        <br>
        <a href="{{ route('habitos.create') }}" class="btn btn-info">Novo</a>
        <a href="{{ route('habitos.relatorio') }}" class="btn btn-success">Gera PDF</a>
    </div>       
@endsection
@section('table-delete')
"habitos"
@endsection