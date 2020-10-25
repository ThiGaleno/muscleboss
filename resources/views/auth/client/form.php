@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de clientes</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Vendedor*</label>
                            <div class="col-md-6">
                                <select id="salesman" class="form-control">
                                    <option value="male">salesman 1</option>
                                    <option value="female">salesman 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Sexo*</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">Data de nascimento*</label>
                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control" name="birth_date" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">Cep*</label>
                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control" name="zip_code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">Estado*</label>
                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Cidade*</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right">Logradouro*</label>
                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control" name="street" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Número</label>
                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control" name="number" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Telefone Celular*</label>
                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="landline" class="col-md-4 col-form-label text-md-right">Telefone Fixo</label>
                            <div class="col-md-6">
                                <input id="landline" type="text" class="form-control" name="landline" autofocus>
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