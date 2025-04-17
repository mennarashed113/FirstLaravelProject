<?php

namespace App\Console\Commands;

use App\Mail\NotifyUser;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
    protected $description = ' send email notify for all users everyday';

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
     //  $user =User::select('email')->get();
       $emails = User::pluck('email')->toArray();
       foreach($emails as $email){
         Mail::to($email)->send(new NotifyUser());
       }
    }
}
