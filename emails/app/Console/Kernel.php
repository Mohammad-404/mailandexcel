<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //here i want call file expiration
        \App\Console\Commands\expiration::class,
        \App\Console\Commands\notify::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {        
        //inside command wrtie name from class expiration..
        //explain here execute after every like minutes 
        $schedule->command('notify:email')->everyMinute();


        // $schedule->command('notify:email')->between($startTime, $endTime); //every day
        
        // $schedule->command('notify:email')->between('2021-08-27', '2021-09-26')->daily();
        
        // $schedule->command('notify:email')
        //           ->monthlyOn(4, '15:00');
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
