@extends('adminlte::default')

@section('content')
    <div class=conteiner-fluid>
        <h3>Editando alimento: {{ $alimento->nome }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route' => ["alimentos.update", $alimento->id], 'method' => 'put', 'files' => true]) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $alimento->nome, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', $alimento->descricao, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('calorias', 'Calorias:') !!}
        {!! Form::number('calorias', $alimento->calorias, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
            {!! Form::label('categoria_id', 'Categoria:') !!}
            {{Form::select('categoria_id', \App\Categoria::orderBy('nome')->pluck('nome', 'id')->toArray(), $alimento->categoria_id,['class'=>'form-control'])}}
        </div>

        <div>
        {!! Form::submit('Editar Alimento',['class'=>'btn - btn-primary', 'require']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection    