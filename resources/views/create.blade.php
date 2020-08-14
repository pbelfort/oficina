@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($orcamento))Editar @else Cadastrar @endif</h1>
    <div class="text-center mt-3 mb-4">
    <a href="{{url("/orcamentos")}}">
        <h3>Voltar</h3>
    </a>
    </div>
    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif
        @if(isset($orcamento))
                <form name="formEdit" id="formEdit" method="post" action="{{url("orcamentos/$orcamento->id")}}">
                    @method('PUT')
            @else
                <form name="formCad" id="formCad" method="post" action="{{url('orcamentos')}}">
        @endif

            @csrf
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="{{$orcamento->relUsers->id ?? ''}}">{{$orcamento->relUsers->name ?? ''}}</option>
                 @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                 @endforeach
            </select>
            <input class="form-control mt-3" type="text" name="cliente" id="cliente" placeholder="Nome do Cliente" value="{{$orcamento->cliente ?? ''}}" required>
            <input class="form-control mt-3 w-50" type="datetime-local" name="data" id="data" value="{{$orcamento->data ?? ''}}" required>
            <input  placeholder="Descrição" class="form-control mt-3" name="descricao" id="descricao" rows="3" value="{{$orcamento->descricao ?? ''}}" required>
            <input class="form-control mt-3" type="text" name="valor" id="valor" placeholder="Valor" value="{{$orcamento->valor ?? ''}}" required>
            <input class="btn btn-success mt-3" type="submit" value="@if(isset($orcamento))Editar @else Cadastrar @endif">

                </form>
        </div>
@endsection
