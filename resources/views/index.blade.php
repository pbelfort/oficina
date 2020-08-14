@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastro de Orçamento</h1>
    <div class="text-center mt-3 mb-4">
    <a href="{{url('orcamentos/create')}}">
        <h3>Cadastrar</h3>
    </a>
    </div>
    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data e Hora</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orcamento as $orcamentos)
                @php
                    $user = $orcamentos->find($orcamentos->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$orcamentos->id}}</th>
                    <td>{{$orcamentos->cliente}}</td>
                    <td>{{$orcamentos->data}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$orcamentos->descricao}}</td>
                    <td>{{$orcamentos->valor}}</td>
                    <td>
                        <button class="btn btn-outline-primary"><a class="text-dark" href="{{url("orcamentos/$orcamentos->id")}}">Visualizar</a></button>
                        <button class="btn btn-outline-secondary"><a class="text-dark " href="{{url("orcamentos/$orcamentos->id/edit")}}">Editar</a></button>
                        <button class="btn btn-outline-danger"><a class="text-dark js-del" href="{{url("orcamentos/$orcamentos->id")}}">Apagar</a></button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
