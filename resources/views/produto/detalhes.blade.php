@extends('layouts.app')

@section('content')
<h1>Detalhes do Produto: {{ $p->nome }} </h1>

<ul>
    <l1><b>Valor: </b> R$ {{ $p->valor}}</l1>
    <l1><b>Descrição: </b>{{ $p->descricao or 'nenhuma descrição informada'}}</l1>
    <l1><b>Quantidade em estoque: </b> {{ $p->quantidade }}</l1>

</ul>

@stop