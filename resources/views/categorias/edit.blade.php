@extends('adminlte::default')

@section('content')
    <div class=conteiner-fluid>
        <h3>Editando categoria: {{ $categoria->nome }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route' => ["categorias.update", $categoria->id], 'method' => 'put', 'files' => true]) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $categoria->nome, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', $categoria->descricao, ['class'=>'form-control', 'require']) !!}
        
        </div> 

        <div>
        {!! Form::submit('Editar Alimento',['class'=>'btn - btn-primary', 'require']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection    