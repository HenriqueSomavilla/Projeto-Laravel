@extends('adminlte::default')

@section('content')
    <div class=conteiner-fluid>
        <h3>Novo Nível</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'nivels.store', 'files' => true]) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', null, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div>
        {!! Form::submit('Criar Categoria',['class'=>'btn - btn-primary', 'require']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection    