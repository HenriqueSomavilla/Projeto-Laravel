@extends('adminlte::default')

@section('content')
    <div class=conteiner-fluid>
        <h3>Novo Alimento</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'alimentos.store', 'files' => true]) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', null, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('calorias', 'Calorias:') !!}
        {!! Form::number('calorias', null, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
            {!! Form::label('categoria_id', 'Categoria:') !!}
            {!! Form::select('categoria_id', \App\Categoria::orderBy('nome')->pluck('nome', 'id')->toArray(), null,['class'=>'form-control']) !!}
        </div>

        <div>
        {!! Form::submit('Criar Alimento',['class'=>'btn - btn-primary', 'require']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection    