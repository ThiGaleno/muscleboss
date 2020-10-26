@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de administrador </div>

                <div class="card-body">
                    @if(isset($user))
                    <form method="POST" action="{{ route('admin-edit', $user->id) }}">
                        @endif
                        <form method="POST" action="{{ route('admin-store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    @if(isset($user))
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name ? $user->name : '' }}" required autocomplete="name" autofocus>
                                    @else
                                    <input id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                                    @endif
                                    <!-- <input name="_method" type="hidden" class="form-control" value="put"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile" class="col-md-4 col-form-label text-md-right">Perfil</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="profile" id="profile" class="form-control">
                                        @if(isset($user))
                                        <option {{ $user->profile == 'admin' ? "selected='selected'" : '' }} value="admin">Admin</option>
                                        <option {{ $user->profile == 'salesman' ? "selected='selected'" : '' }} value="salesman">Salesman</option>
                                        @else
                                        <option value="admin">Admin</option>
                                        <option value="salesman">Salesman</option>
                                        @endif

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    @if(isset($user))
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email ? $user->email : '' }}" required autocomplete="email">
                                    @else
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection