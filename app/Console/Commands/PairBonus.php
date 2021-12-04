<?php

namespace App\Console\Commands;

use App\Models\CashWallet;
use App\Models\GeneralSettings;
use App\Models\PairCount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

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


        $users = PairCount::selectRaw('user_id,sum(no_of_pair) no_of_pair')->where('status',1)->groupBy('user_id')->get()->toArray();
        //$users = PairCount::selectRaw('user_id,sum(no_of_pair) no_of_pair')->where('status',0)->where('date',Carbon::today())->groupBy('user_id')->get()->toArray();
        $g_set = GeneralSettings::first();

        foreach ($users as $user){
            $left_side_balance=$right_side_balance=null;
            $user_info = User::findOrFail($user['user_id']);
            $left_side = $user_info->left_side;
            $right_side = $user_info->right_side;
            if ($left_side){
                $user_package_info_l = User::where('user_name', $left_side)->with('packages')->first();
                if ($user_package_info_l){
                   $left_side_balance= $user_package_info_l->packages->price;
                }
            }

            if ($right_side){
                $user_package_info_r = User::where('user_name', $right_side)->with('packages')->first();
                if ($user_package_info_r){
                    $right_side_balance= $user_package_info_r->packages->price;
                }
            }
        //dd($left_side_balance,$right_side_balance);

            $bonus_amount = new CashWallet();
            $bonus_amount->user_id = $user['user_id'];
            $bonus_amount->bonus_amount = $user['no_of_pair'] * $g_set->pair_amount*$g_set->pair_percentage/100;
            $bonus_amount->method = 'Pair Bonus';
            $bonus_amount->save();

            PairCount::where('user_id', $user['user_id'])->where('status',0)
                ->update(['status' => 1]);
        }
          $this->info('Successfully added Pair bonus.');
    }

}
