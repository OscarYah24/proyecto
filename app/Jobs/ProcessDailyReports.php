<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProcessDailyReports implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Acción 1: Escribir mensaje en los logs
        Log::info('Job ProcessDailyReports ejecutado correctamente', [
            'timestamp' => Carbon::now()->toDateTimeString(),
            'message' => 'Procesando reportes diarios automaticamente'
        ]);

        // Acción 2: Realizar un cálculo simple
        $totalArticles = DB::table('articles')->count();
        $totalCategories = DB::table('categories')->count();
        
        // Acción 3: Simular procesamiento de datos
        $reportData = [
            'total_articles' => $totalArticles,
            'total_categories' => $totalCategories,
            'processing_date' => Carbon::now()->toDateString(),
            'status' => 'completed'
        ];

        // Acción 4: Guardar el resultado en logs
        Log::info('Reporte diario generado', $reportData);

        // Acción 5: Actualizar timestamp en una tabla (opcional)
        try {
            DB::table('job_executions')->insert([
                'job_name' => 'ProcessDailyReports',
                'executed_at' => Carbon::now(),
                'data' => json_encode($reportData),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } catch (\Exception $e) {
            Log::warning('No se pudo guardar en job_executions (tabla no existe)', [
                'error' => $e->getMessage()
            ]);
        }
    }
}