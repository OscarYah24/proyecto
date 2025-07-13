@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle me-2"></i>Crear Categoría
                    </h4>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Volver
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        {{-- Campo Nombre --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nombre de categoría <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Ingresa el nombre de la categoría"
                                   maxlength="120"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>Máximo 120 caracteres
                            </div>
                        </div>

                        {{-- Campo Descripción --}}
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">
                                Descripción <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" 
                                      name="descripcion" 
                                      rows="4" 
                                      placeholder="Describe brevemente esta categoría"
                                      maxlength="120"
                                      required>{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>Máximo 120 caracteres
                            </div>
                        </div>

                        {{-- Mensaje informativo --}}
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-lightbulb me-2"></i>
                            <strong>Recuerda:</strong> Siempre guardar los cambios antes de salir del formulario.
                        </div>

                        {{-- Botones de acción --}}
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-times me-1"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Crear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript para contador de caracteres --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Contador para nombre
    const nameInput = document.getElementById('name');
    const nameText = nameInput.nextElementSibling.nextElementSibling;
    
    nameInput.addEventListener('input', function() {
        const remaining = 120 - this.value.length;
        nameText.innerHTML = `<i class="fas fa-info-circle me-1"></i>Caracteres restantes: ${remaining}/120`;
        
        if (remaining < 20) {
            nameText.className = 'form-text text-warning';
        } else {
            nameText.className = 'form-text';
        }
    });

    // Contador para descripción
    const descInput = document.getElementById('descripcion');
    const descText = descInput.nextElementSibling.nextElementSibling;
    
    descInput.addEventListener('input', function() {
        const remaining = 120 - this.value.length;
        descText.innerHTML = `<i class="fas fa-info-circle me-1"></i>Caracteres restantes: ${remaining}/120`;
        
        if (remaining < 20) {
            descText.className = 'form-text text-warning';
        } else {
            descText.className = 'form-text';
        }
    });
});
</script>
@endsection