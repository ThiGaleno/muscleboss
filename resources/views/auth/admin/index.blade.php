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
                @foreach($admins as $admin)
                <tr>
                    <td>
                        @if($admin->profile == 'salesman')
                        <a class="btn btn-success" href="{{ route('admin-create', $admin->id) }}">Editar</a>
                        <a class="btn btn-danger" href="{{ route('admin-delete', $admin->id) }}">Excluir</a>
                        @else
                        @endif
                    </td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->profile }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection