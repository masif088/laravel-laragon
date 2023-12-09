<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:activity';

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
//        foreach (User::where('role','=',3)->get() as $user){
//            if (Carbon::now()->startOfDay() >= Carbon::parse($user->payment_deadline)) {
//                if ($user->user_status_id==1){
//                    $user->update([
//                        'user_status_id'=>2
//                    ]);
//                }
//            }
//        }
    }
}
