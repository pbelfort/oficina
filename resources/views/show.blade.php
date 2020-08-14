@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1>
    <div class="text-center mt-3 mb-4">
    <a href="{{url("/orcamentos")}}">
        <h3>Voltar</h3>
    </a>
    </div>
    <div class="col-8 m-auto">
        @php
            $user=$orcamento->find($orcamento->id)->relUsers;
        @endphp
       Id: {{$orcamento->id}}<br>
       Cliente: {{$orcamento->cliente}} <br>
       Data: {{$orcamento->data}} <br>
       Funcionario: {{$user->name}}<br>
       Descrição: {{$orcamento->descricao}} <br>
       Valor: {{$orcamento->valor}} <br>
    </div>
@endsection
