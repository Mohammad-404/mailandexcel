<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire'; //here is name to my task

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire user every 5 minute automaticaliy';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //*note here i want write code to execute yale bde ana yeah
        //here i want work things 
        //give ma all user 
        $users = User::where('expire',0) -> get(); //give me all user expire active okay 
        
        foreach($users as $user){
            $user -> update(['expire' => 1]); //update expire is not active 
        }

        //after this code i want call of this code after like 5 minites i want using file from kernel
    }
}
