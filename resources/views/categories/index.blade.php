@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-folder me-2"></i>Gestión de Categorías
                    </h4>
                    <a href="{{ route('categories.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i>Nueva Categoría
                    </a>
                </div>

                <div class="card-body">
                    {{-- Mensajes de éxito/error --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-1"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-1"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Tabla de categorías --}}
                    @if($categories->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Artículos</th>
                                        <th scope="col">Fecha Creación</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>
                                                <strong>{{ $category->name }}</strong>
                                            </td>
                                            <td>{{ Str::limit($category->descripcion, 50) }}</td>
                                            <td>
                                                <span class="badge bg-primary">
                                                    {{ $category->articles_count }} artículos
                                                </span>
                                            </td>
                                            <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('categories.show', $category) }}" 
                                                       class="btn btn-info btn-sm" title="Ver">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('categories.edit', $category) }}" 
                                                       class="btn btn-warning btn-sm" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('categories.destroy', $category) }}" 
                                                          method="POST" 
                                                          style="display: inline-block"
                                                          onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-danger btn-sm" 
                                                                title="Eliminar">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">No hay categorías registradas</h4>
                            <p class="text-muted">Comienza creando tu primera categoría</p>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Crear Primera Categoría
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection