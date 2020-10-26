@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-right">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Ações</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>
                        <a class="btn btn-success" href="{{ route('client-create', $client->id) }}">Editar</a>
                        <a class="btn btn-danger" href="{{ route('client-delete', $client->id) }}">Excluir</a>
                    </td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->profile }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection