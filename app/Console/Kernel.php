<?php

namespace App\Console;

use App\Console\Commands\CovidAdd;
use App\Console\Commands\CovidDelete;
use App\Console\Commands\CovidGet;
use App\Console\Commands\CovidGetByCountry;
use App\Console\Commands\CovidList;
use App\Console\Commands\CovidUpdate;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CovidAdd::class,
        CovidList::class,
        CovidUpdate::class,
        CovidGet::class,
        CovidDelete::class,
        CovidGetByCountry::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
