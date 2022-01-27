<?php

namespace App\Console\Commands;

use App\Models\CashWallet;
use App\Models\GeneralSettings;
use App\Models\PairLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class PairBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pairbonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

         //return Command::SUCCESS;
         $results= User::all();
           $g_set = GeneralSettings::first();



 //dd($results);
         foreach ($results as $key => $result) {
           $left_count= $result->left_active;
           $right_count= $result->right_active;

             if ($left_count != 0 && $right_count !=0 ) {
                 //dd($left_count,$right_count);


                 $min_pair = min($left_count,$right_count );
                 $check_pair_availability = $min_pair/$g_set->pair_amount;
                 //dd($check_pair_availability );
                 if ($check_pair_availability <= $g_set->pair_amount){
                    $amount= $check_pair_availability;
                 }else{
                     $amount = $g_set->pair_amount;
                 }

                 //dd($min_pair);


                   //
                   // $bonus_amount = new AddMoney();
                   // $bonus_amount->user_id = $result->id;
                   // $bonus_amount->amount = $pair_bonus;
                   // $bonus_amount->type = 'Credit';
                   // $bonus_amount->method = 'Pair Bonus';
                   // $bonus_amount->status = 'approve';
                   // $bonus_amount->save();

                   $bonus_amount = new CashWallet();
                   $bonus_amount->user_id = $result->id;
                   //$bonus_amount->bonus_amount = $result[0]['no_of_pair'] * $constant * $g_set->pair_amount * $g_set->pair_percentage / 100;
                   $bonus_amount->bonus_amount = $amount * 1.5;
                   $bonus_amount->method = 'Pair Bonus';
                   $bonus_amount->note = 'Bonus';

                   $bonus_amount->save();


                   //store pair log

                   $pair_log = new PairLog();
                   $pair_log->sponsor_id = $result->id;
                   $pair_log->pair = $check_pair_availability;
                   $pair_log->status = 1;


                   $pair_log->save();

                   $update = User::find($result->id);
                   if ($left_count<$right_count ) {
                       $update->left_active= '0';
                       $update->right_active= $right_count-$left_count;
                       $update->save();
                   }elseif ($left_count>=$right_count) {
                     $update->left_active= $left_count-$right_count;
                     $update->right_active= '0';
                     $update->save();
                   }



             }
         }
         $this->info('Successfully added Pair bonus.');
     }

}
