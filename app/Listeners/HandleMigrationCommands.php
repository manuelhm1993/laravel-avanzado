<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Support\Facades\Storage;

class HandleMigrationCommands
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CommandFinished $event): void
    {
        $commandsToWatch = [
            'migrate:fresh',
            'migrate:refresh',
            'migrate:reset',
            'migrate:rollback',
        ];

        if (in_array($event->command, $commandsToWatch)) {
            $disk = Storage::disk('public');
            $folder = 'img';

            // Eliminar la carpeta si existe
            if ($disk->exists($folder)) {
                $disk->deleteDirectory($folder);
                info("La carpeta '$folder' ha sido eliminada del disco 'public'.");
            }

            // Crear la carpeta nuevamente vacía
            $disk->makeDirectory($folder);
            info("La carpeta '$folder' ha sido creada nuevamente en el disco 'public'.");
        }
    }
}
