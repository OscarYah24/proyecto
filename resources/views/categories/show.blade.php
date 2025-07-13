@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-folder-open me-2"></i>{{ $category->name }}
                    </h4>
                    <div>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i>Editar
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Volver
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    {{-- Información de la categoría --}}
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        <i class="fas fa-tag me-1"></i>Información de la Categoría
                                    </h6>
                                    <p class="card-text">
                                        <strong>ID:</strong> {{ $category->id }}<br>
                                        <strong>Nombre:</strong> {{ $category->name }}<br>
                                        <strong>Descripción:</strong> {{ $category->descripcion }}<br>
                                        <strong>Creada:</strong> {{ $category->created_at->format('d/m/Y H:i') }}<br>
                                        <strong>Actualizada:</strong> {{ $category->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-newspaper fa-3x mb-2"></i>
                                    <h3 class="card-title">{{ $category->articles->count() }}</h3>
                                    <p class="card-text">Artículos en esta categoría</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Lista de artículos --}}
                    <div class="mb-3">
                        <h5>
                            <i class="fas fa-list me-2"></i>Artículos en esta categoría
                        </h5>
                    </div>

                    @if($category->articles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Título</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->articles as $article)
                                        <tr>
                                            <td>{{ $article->id }}</td>
                                            <td>
                                                <strong>{{ $article->title }}</strong>
                                                <br>
                                                <small class="text-muted">
                                                    {{ Str::limit($article->content, 50) }}
                                                </small>
                                            </td>
                                            <td>{{ $article->author }}</td>
                                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('articles.show', $article) }}" 
                                                   class="btn btn-info btn-sm" 
                                                   title="Ver artículo">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('articles.edit', $article) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Editar artículo">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">No hay artículos en esta categoría</h5>
                            <p class="text-muted">Los artículos que se asignen a esta categoría aparecerán aquí</p>
                            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Crear Primer Artículo
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection