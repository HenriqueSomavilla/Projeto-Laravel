@extends('adminlte::default')

@section('content')
    <div class="fluid">
        <h1>Editando Histórico</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif 

        {!! Form::open(['route' => ['historicos.update', $historico->id], 'method'=>'put']) !!}

        <!-- <div class="form-group">
            {!! Form::label('habito_id', 'Hábito:') !!}
            {{Form::select('habito_id', \App\Habito::orderBy('nome')->pluck('nome', 'id')->toArray(), $historico->habito_id,['class'=>'form-control'])}}
        </div> -->

        <div class="form-group">
            {!! Form::label('data', 'Data:') !!}
            {!! Form::text('data', $historico->data,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('hora', 'Hora:') !!}
            {!! Form::text('hora', $historico->hora,['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-12">
            <h4>Hábitos</h4>

            <div class="input_fields_wrap">
            @foreach( $historico->historico_habitos as $hh)

            <div>
                <div style="width:94%; float:left" id="habito">
                    {!! Form::select("itens[]",
                        \App\Habito::orderBy("nome")->pluck("nome", "id")->toArray(),
                        $hh->habito->id,
                        ["class"=>"form-control", "required",
                            "placeholder"=>"Selecione um hábito"])
                    !!}
                </div>
                <button type="button" class="remove_field btn btn-danger btn-circle">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            @endforeach  
            </div>
            <br>

            <button style="float:right;" class="add_field_button btn btn-success">Adicionar hábitos</button>

            <br>

            <hr />
            </div>


        <div class="form-group">
        {!! Form::submit('Criar Histórico',['class'=>'btn - btn-primary', 'require']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('dyn_scripts')
<script>
        $(document).ready(function(){
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");

            var x = 0;
            $(add_button).click(function(e){
                x++;
                var newField = 
                `<div>
                    <div style="width: 94%; float:left" id="habito">
                        {!! Form::select("itens[]", \App\Habito::orderBy("nome")->pluck("nome", "id")->toArray(),
                            null,
                            ["class"=>"form-control", "required", "placeholder"=>"Selecione um hábito"])!!}
                    </div>
                    <button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i>
                    </button>
                </div>`;

                $(wrapper).append(newField);
            });

            $(wrapper).on("click", ".remove_field", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
</script>
@endsection