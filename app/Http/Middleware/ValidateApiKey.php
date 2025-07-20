<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ValidateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener el valor del header API-KEY
        $apiKey = $request->header('API-KEY');

        // Verificar si el header API-KEY está presente
        if (empty($apiKey)) {
            return $this->unauthorizedResponse('API-KEY header is missing');
        }

        // Verificar si el header API-KEY no está vacío
        if (trim($apiKey) === '') {
            return $this->unauthorizedResponse('API-KEY header cannot be empty');
        }

        // Opcional: Validar formato o valor específico de la API-KEY
        if (!$this->isValidApiKey($apiKey)) {
            return $this->unauthorizedResponse('Invalid API-KEY provided');
        }

        // Si todas las validaciones pasan, continuar con la petición
        return $next($request);
    }

    /**
     * Generar respuesta de error no autorizado
     *
     * @param string $message
     * @return JsonResponse
     */
    private function unauthorizedResponse(string $message): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => 'UNAUTHORIZED',
                'message' => $message,
                'details' => 'Please provide a valid API-KEY in the request headers.',
                'timestamp' => now()->toISOString(),
                'path' => request()->getPathInfo()
            ]
        ], 401); // HTTP 401 Unauthorized
    }

    /**
     * Validar el formato y valor de la API-KEY
     *
     * @param string $apiKey
     * @return bool
     */
    private function isValidApiKey(string $apiKey): bool
    {
        // Validaciones básicas de formato
        // La API-KEY debe tener al menos 10 caracteres
        if (strlen($apiKey) < 10) {
            return false;
        }

        // La API-KEY debe contener solo caracteres alfanuméricos y guiones
        if (!preg_match('/^[a-zA-Z0-9\-_]+$/', $apiKey)) {
            return false;
        }

        // Lista de API-KEYs válidas (en un entorno real estarían en base de datos o .env)
        $validApiKeys = [
            'test-api-key-123456',
            'development-key-789',
            'usap-portal-api-2024',
            'categories-api-v1-key'
        ];

        // Verificar si la API-KEY está en la lista de llaves válidas
        return in_array($apiKey, $validApiKeys, true);
    }
}