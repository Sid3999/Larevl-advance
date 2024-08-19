<?php

namespace App\Console\Commands;

use App\Models\SceduleClasses;
use Illuminate\Console\Command;

class IncrementDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increment-days {--days=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $scheduledClasses = SceduleClasses::latest('date_time')->get();
       
        $scheduledClasses->each(function($class ) {
        $days = (int)$this->option('days');
        $class->date_time = $class->date_time->addDays($days);
        $class->save();
        });
    }
}
