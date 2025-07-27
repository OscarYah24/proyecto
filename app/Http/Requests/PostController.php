<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Constructor - Aplicar middleware de autenticación
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Devolver una lista de publicaciones (posts) en formato JSON
     * Esta función será la que probemos con las pruebas unitarias
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            // Obtener todos los artículos con sus categorías relacionadas
            $posts = Article::with('category')
                           ->orderBy('created_at', 'desc')
                           ->get();

            // Formatear la respuesta para que sea más estructurada
            $formattedPosts = $posts->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'author' => $post->author,
                    'created_at' => $post->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $post->updated_at->format('Y-m-d H:i:s'),
                    'category' => [
                        'id' => $post->category->id,
                        'name' => $post->category->name,
                        'description' => $post->category->description // Usa el accessor
                    ]
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Posts retrieved successfully',
                'data' => $formattedPosts,
                'total' => $formattedPosts->count()
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving posts',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar un post específico
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $post = Article::with('category')->findOrFail($id);

            $formattedPost = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->author,
                'created_at' => $post->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $post->updated_at->format('Y-m-d H:i:s'),
                'category' => [
                    'id' => $post->category->id,
                    'name' => $post->category->name,
                    'description' => $post->category->description
                ]
            ];

            return response()->json([
                'success' => true,
                'message' => 'Post retrieved successfully',
                'data' => $formattedPost
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Crear un nuevo post usando PostRequest para validación
     * 
     * @param PostRequest $request
     * @return JsonResponse
     */
    public function store(PostRequest $request): JsonResponse
    {
        try {
            // Los datos ya están validados por PostRequest
            $validatedData = $request->validated();
            
            // Crear el artículo
            $post = Article::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'author' => $validatedData['author'],
                'category_id' => $validatedData['category_id']
            ]);

            // Cargar la relación de categoría
            $post->load('category');

            // Formatear respuesta
            $formattedPost = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->author,
                'created_at' => $post->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $post->updated_at->format('Y-m-d H:i:s'),
                'category' => [
                    'id' => $post->category->id,
                    'name' => $post->category->name,
                    'description' => $post->category->description
                ]
            ];

            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
                'data' => $formattedPost
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating post',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}