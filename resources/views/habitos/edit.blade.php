@extends('adminlte::default')

@section('content')
    <div class=conteiner-fluid>
        <h3>Editando hábito: {{ $habito->nome }}</h3>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        {!! Form::open(['route' => ["habitos.update", $habito->id], 'method' => 'put', 'files' => true]) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $habito->nome, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::textarea('descricao', $habito->descricao, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('tp_habito', 'Tipo:') !!}
        {!! Form::select('tp_habito', array('B'=>'Bom', 'R'=>'Ruim'),'$habito->tp_habito',['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('objetivo', 'Objetivo:') !!}
        {!! Form::number('objetivo', $habito->objetivo, ['class'=>'form-control', 'require']) !!}
        
        </div>

        <div class="form-group">
        {!! Form::label('dt_inicio_ctrl', 'Data:') !!}
        {!! Form::date('dt_inicio_ctrl', $habito->dt_inicio_ctrl, ['class'=>'form-control', 'require']) !!}
        </div>

        {!! Form::label('nivel_id', 'Nivel:') !!}
            {{Form::select('nivel_id', \App\Nivel::orderBy('nome')->pluck('nome', 'id')->toArray(), $habito->nivel_id,['class'=>'form-control'])}}

        <div class="form-group">
            {!! Form::label('foto', 'Foto atual:') !!}<br>
            <?php
                $data = $habito->foto;
                echo '<img style="max-width:250px; max-height:250px; width: auto; height: auto;" src="data:image/jpeg;base64,'.base64_encode($data).'"/>';
            ?>
        </div>

        <div class="form-group">
        {!! Form::label('foto', 'Alterar foto:') !!}
        <input type="file" id="foto" name="foto" class="btn btn-default"/>
        </div>

        <div>
        {!! Form::submit('Editar Hábito',['class'=>'btn - btn-primary', 'require']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection    