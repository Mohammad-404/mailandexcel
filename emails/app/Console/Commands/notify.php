<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;
use Carbon\Carbon;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sent email to users';

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
        $datess = Carbon::now()->format('Y-m-d');

        $emails = User::where('enddate',$datess)->pluck('email')->toArray(); 
        
        $enddate = User::select('enddate')->get();

        $data = ['title' => 'programming' , 'body' => 'PHP Developer'];
        
        foreach ($enddate as $value) {   
            if($value->enddate == $datess){
                foreach($emails as $email){
                    //now here send email to user
                    Mail::To($email) -> send(new NotifyEmail($data));
                }   
            }
        }
        
        
    }
}
