@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-8 col-lg-10 col-md-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                                <p class="mb-4">Insira seu email abaixo e enviaremos um link para cadastrar uma nova senha!</p>
                            </div>
                          
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <form method="POST" action="{{ route('password.email') }}" class="user">
                                @csrf

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                    Enviar link de recuperação de senha
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('register')}}">Cria uma conta!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Já possui conta? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
