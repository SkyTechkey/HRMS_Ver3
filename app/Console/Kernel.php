<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Word::class,
//        'App\Console\Commands\WordOfTheDay',
//        Commands\DemoCron::class,
//        Commands\InactiveUser::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
             $this->command('word:days')->everyTwoMinutes();
        });
//        $schedule->command('sheduling:create')->everyMinute();
//        $schedule->call(function () {
//            User::where('last_login', '>', 100)
//                ->get()
//                ->each()
//                ->delete();
//        })->everyTwoMinutes();
//        $schedule->command('word:day')
//            ->daily();
//        $schedule->command('demo:cron')->everyMinute();
//        $schedule->command('email:inactiveUsers')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
