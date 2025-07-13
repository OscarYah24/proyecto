<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Constructor - Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar lista de categorías
     */
    public function index()
    {
        $categories = Category::withCount('articles')
                             ->orderBy('created_at', 'desc')
                             ->get();
        
        return view('categories.index', compact('categories'));
    }

    /**
     * Mostrar formulario para crear nueva categoría
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Guardar nueva categoría
     */
    public function store(CategoryRequest $request)
    {
        
        Category::create($request->validated());

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Mostrar una categoría específica
     */
    public function show(Category $category)
    {
        $category->load('articles'); // Cargar artículos relacionados
        return view('categories.show', compact('category'));
    }

    /**
     * Mostrar formulario para editar categoría
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Actualizar categoría
     */
    public function update(CategoryRequest $request, Category $category)
    {
        
        $category->update($request->validated());

        return redirect()->route('categories.index')
                        ->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Eliminar categoría
     */
    public function destroy(Category $category)
    {
        // Verificar si la categoría tiene artículos asociados
        if ($category->articles()->count() > 0) {
            return redirect()->route('categories.index')
                            ->with('error', 'No se puede eliminar la categoría porque tiene artículos asociados.');
        }

        $category->delete();
        
        return redirect()->route('categories.index')
                        ->with('success', 'Categoría eliminada exitosamente.');
    }
}