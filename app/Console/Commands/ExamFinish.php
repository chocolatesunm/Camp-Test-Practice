<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ExamFinish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:exam-finish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove vendor directory and clear all caches';

    public function handle()
    {
        try {
            $this->info('Clearing Laravel cache...');
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('config:cache');
            $this->info('Clear Laravel cache Success');
            $this->info('Removing vendor directory...');
            File::deleteDirectory(base_path('vendor'));
        } catch (Exception $e) {
        }
        return 0;
    }
}
