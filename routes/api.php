<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**
 * Rutas API protegidas con middleware validate.api
 * Estas rutas requieren el header API-KEY para acceder
 */
Route::middleware(['validate.api'])->prefix('v1')->group(function () {
    
    // Ruta de prueba básica
    Route::get('/test', function () {
        return response()->json([
            'success' => true,
            'message' => 'API-KEY validation successful!',
            'data' => [
                'timestamp' => now()->toISOString(),
                'endpoint' => '/api/v1/test',
                'authenticated' => true,
                'laravel_version' => app()->version()
            ]
        ]);
    });

    // API de categorías protegida
    Route::apiResource('categories', CategoryApiController::class);

    // Ruta de información del usuario autenticado via API
    Route::get('/user-info', function (Request $request) {
        return response()->json([
            'success' => true,
            'message' => 'User information retrieved successfully',
            'data' => [
                'api_key' => $request->header('API-KEY'),
                'user_agent' => $request->userAgent(),
                'ip_address' => $request->ip(),
                'timestamp' => now()->toISOString(),
                'method' => $request->method(),
                'path' => $request->path()
            ]
        ]);
    });

    // Ruta de estadísticas protegida
    Route::get('/stats', function () {
        return response()->json([
            'success' => true,
            'message' => 'Statistics retrieved successfully',
            'data' => [
                'total_categories' => \App\Models\Category::count(),
                'total_articles' => \App\Models\Article::count(),
                'server_time' => now()->toISOString(),
                'api_version' => '1.0.0',
                'laravel_version' => app()->version(),
                'php_version' => PHP_VERSION
            ]
        ]);
    });

    // Ruta para validar que el middleware funciona
    Route::get('/validate', function (Request $request) {
        return response()->json([
            'success' => true,
            'message' => 'Middleware validation passed successfully',
            'data' => [
                'middleware' => 'validate.api',
                'api_key_received' => $request->header('API-KEY'),
                'validation_status' => 'PASSED',
                'timestamp' => now()->toISOString()
            ]
        ]);
    });
});

/**
 * Rutas API públicas (sin middleware)
 * Estas rutas NO requieren API-KEY
 */
Route::prefix('public')->group(function () {
    
    // Información pública de la API
    Route::get('/info', function () {
        return response()->json([
            'success' => true,
            'message' => 'Public API information',
            'data' => [
                'api_name' => 'USAP Portal API',
                'version' => '1.0.0',
                'laravel_version' => app()->version(),
                'documentation' => '/api/docs',
                'requires_api_key' => false,
                'protected_endpoints' => [
                    '/api/v1/test',
                    '/api/v1/categories',
                    '/api/v1/user-info',
                    '/api/v1/stats',
                    '/api/v1/validate'
                ],
                'public_endpoints' => [
                    '/api/public/info',
                    '/api/public/health'
                ],
                'timestamp' => now()->toISOString()
            ]
        ]);
    });

    // Estado del servicio
    Route::get('/health', function () {
        $databaseStatus = 'unknown';
        
        try {
            \Illuminate\Support\Facades\DB::connection()->getPdo();
            $databaseStatus = 'connected';
        } catch (\Exception $e) {
            $databaseStatus = 'disconnected';
        }

        return response()->json([
            'success' => true,
            'message' => 'Service health check',
            'data' => [
                'status' => 'up',
                'database' => $databaseStatus,
                'laravel_version' => app()->version(),
                'php_version' => PHP_VERSION,
                'memory_usage' => round(memory_get_usage(true) / 1024 / 1024, 2) . ' MB',
                'timestamp' => now()->toISOString()
            ]
        ]);
    });
});

/**
 * Ruta de fallback para API
 * Maneja rutas no encontradas en la API
 */
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'error' => [
            'code' => 'NOT_FOUND',
            'message' => 'API endpoint not found',
            'details' => 'The requested API endpoint does not exist.',
            'available_endpoints' => [
                'GET /api/public/info',
                'GET /api/public/health',
                'GET /api/v1/test (requires API-KEY)',
                'GET /api/v1/categories (requires API-KEY)',
                'GET /api/v1/user-info (requires API-KEY)',
                'GET /api/v1/stats (requires API-KEY)',
                'GET /api/v1/validate (requires API-KEY)'
            ],
            'timestamp' => now()->toISOString()
        ]
    ], 404);
});