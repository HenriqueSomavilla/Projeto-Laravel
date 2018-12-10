@extends('adminlte::default')

@section('content')
    <div class="fluid">
        <h1>Históricos</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Hábito(s)</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historicos as $hist)
                    <tr>
                        <td>{{ $hist->data }}</td>
                        <td>{{ $hist->hora}}</td>

                        <td>
                            @foreach($hist->historico_habitos as $hab)
                                <ul>
                                <li>{{$hab->habito->nome}}</li>
                                </ul>
                            @endforeach
                        </td>

                        <td>
                            <a href=" {{ route('historicos.edit', ['edit'=>$hist->id]) }}"
                                class="btn-sm btn-success">Editar</a>
                            <a href="#" onclick="return ConfirmaExclusao({{$hist->id}})"
                                class="btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <div>
            <br/>
            <a href="{{ url('/historicos/createmaster') }}" class="btn btn-primary">Cadastrar</a>
        </div>
        
    </div>
    @endsection

    @section('table-delete')
    "historicos"
    @endsection
  