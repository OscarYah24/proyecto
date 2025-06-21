@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crear artículo</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Artículos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear artículo</li>
            </ol>
        </nav>
    </div>

    <!-- Formulario Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                
                <!-- Nombre del artículo -->
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">
                        Nombre del artículo <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Contenido -->
                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">
                        Contenido <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" 
                                  name="content" 
                                  rows="6" 
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Autor -->
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">
                        Autor <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" 
                               class="form-control @error('author') is-invalid @enderror" 
                               id="author" 
                               name="author" 
                               value="{{ old('author') }}" 
                               required>
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Categoría -->
                <div class="form-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">
                        Categoría <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            <option value="">Completa este campo</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Botones -->
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i>
                                Recuerda siempre guardar los cambios.
                            </small>
                            <div>
                                <a href="{{ route('articles.index') }}" class="btn btn-secondary mr-2">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    .card {
        border: none;
        border-radius: 0.35rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
    }
    
    .form-control:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
    }
    
    .text-danger {
        color: #e74a3b !important;
    }
    
    .breadcrumb {
        background-color: transparent;
        padding: 0;
        margin-bottom: 0;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
        color: #858796;
    }
    
    .alert {
        border: none;
        border-radius: 0.35rem;
    }
    
    .invalid-feedback {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: #e74a3b;
    }
    
    .is-invalid {
        border-color: #e74a3b;
    }
</style>
@endsection