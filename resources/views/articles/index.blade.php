@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Artículos</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artículos</li>
            </ol>
        </nav>
    </div>

    <!-- Botón crear nuevo artículo -->
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('articles.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Crear</span>
            </a>
        </div>
    </div>

    <!-- DataTable Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Artículos</h6>
        </div>
        <div class="card-body">
            <!-- Mensajes de éxito -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Selector de entradas -->
            <div class="row mb-3">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length">
                        <label>Show 
                            <select name="entries" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_filter text-right">
                        <label>Search: 
                            <input type="search" class="form-control form-control-sm" placeholder="">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Tabla responsiva -->
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Título <i class="fas fa-sort"></i></th>
                            <th>Autor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->author }}</td>
                            <td>
                                <a href="{{ route('articles.edit', $article) }}" 
                                   class="btn btn-primary btn-sm">
                                    Editar artículo
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay artículos disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info">
                        Showing 1 to {{ $articles->count() }} of {{ $articles->count() }} entries
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estilos adicionales -->
<style>
    .btn-icon-split {
        border-radius: 0.35rem;
        overflow: hidden;
    }
    
    .btn-icon-split .icon {
        background: rgba(0, 0, 0, 0.15);
        display: inline-block;
        padding: 0.375rem 0.75rem;
    }
    
    .btn-icon-split .text {
        display: inline-block;
        padding: 0.375rem 0.75rem;
    }
    
    .table th {
        border-top: none;
        font-weight: 600;
        color: #5a5c69;
    }
    
    .dataTables_length,
    .dataTables_filter {
        margin-bottom: 1rem;
    }
    
    .dataTables_info {
        padding-top: 0.75rem;
    }
    
    .dataTables_paginate {
        padding-top: 0.75rem;
    }
    
    .custom-select-sm {
        width: auto;
        display: inline-block;
    }
    
    .alert {
        border: none;
        border-radius: 0.35rem;
    }
</style>
@endsection