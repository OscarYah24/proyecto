<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\ProcessDailyReports;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Configuración del Schedule para Jobs
Schedule::job(new ProcessDailyReports())
    ->everyMinute()
    ->name('process-daily-reports')
    ->withoutOverlapping()
    ->onSuccess(function () {
        \Log::info('Schedule: ProcessDailyReports completado exitosamente');
    })
    ->onFailure(function () {
        \Log::error('Schedule: ProcessDailyReports falló en su ejecución');
    })
    ->appendOutputTo(storage_path('logs/schedule.log'));

// Versión para producción (ejecutar diariamente a las 2:00 AM)
// Schedule::job(new ProcessDailyReports())
//     ->dailyAt('02:00')
//     ->name('process-daily-reports-production')
//     ->withoutOverlapping()
//     ->appendOutputTo(storage_path('logs/daily-reports.log'));

// Job adicional cada 5 minutos para demostrar múltiples schedules
Schedule::job(new ProcessDailyReports())
    ->everyFiveMinutes()
    ->name('process-daily-reports-5min')
    ->withoutOverlapping()
    ->when(function () {
        // Solo ejecutar en horario de oficina (8 AM a 6 PM)
        $hour = now()->hour;
        return $hour >= 8 && $hour <= 18;
    })
    ->onSuccess(function () {
        \Log::info('Schedule 5min: ProcessDailyReports ejecutado en horario de oficina');
    });