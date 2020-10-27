@extends('layouts.app')

@section('content')

<div class="container">
    <a class="btn" href="{{ route('client-create') }}" style="padding-bottom: 10px;">Cadastrar</a>
    <div class="row justify-content-right">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>@if($client->salesman_id == auth::user()->id)
                        <a class="btn btn-success" href="{{ route('client-create', $client->id) }}">Editar</a>
                        @endif
                        @if(auth::user()->profile == 'admin')
                        <a class="btn btn-danger" href="{{ route('client-delete', $client->id) }}">Excluir</a>
                        @endif
                    </td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->salesman }}</td>
                    <td>{{ $client->birth_date }}</td>
                    <td>{{ $client->gender }}</td>
                    <td>{{ $client->mobile }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection