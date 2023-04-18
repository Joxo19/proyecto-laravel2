@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Verifica tu correo') }}
                        </div>
                    @endif

                    {{ __('Para iniciar.se le acaba de enviar un correo de verificacion, para validacion de correo') }}
                    {{ __('Si aun no recibes tu correo de verificacion') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic para reenviar otro correo de verificacion') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
