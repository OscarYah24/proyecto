@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        <div class="col-md-6 mb-4">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                                    <h5 class="card-title">Gestión de Artículos</h5>
                                    <p class="card-text">Administra los artículos del sistema universitario</p>
                                    <a href="{{ route('articles.index') }}" class="btn btn-primary">
                                        Ir a Artículos
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="card border-info">
                                <div class="card-body">
                                    <i class="fas fa-briefcase fa-3x text-info mb-3"></i>
                                    <h5 class="card-title">Bolsa de Empleo</h5>
                                    <p class="card-text">Gestiona las ofertas laborales disponibles</p>
                                    <a href="#" class="btn btn-info">
                                        Próximamente
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Bienvenido al Sistema USAP
                                    </h5>
                                    <p class="card-text">
                                        Has iniciado sesión exitosamente. Desde este panel puedes gestionar 
                                        los artículos y contenido del portal universitario.
                                    </p>
                                    @auth
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>
                                        Conectado como: <strong>{{ Auth::user()->name }}</strong>
                                    </small>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection