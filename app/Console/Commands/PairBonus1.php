<?php

namespace App\Console\Commands;

use App\Models\CashWallet;
use App\Models\GeneralSettings;
use App\Models\PairCount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class PairBonus1 extends Command
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
        $users=User::selectRaw('max(no_of_pairs) no_of_pairs,max(u.user_name) sponsor_name,max(users.sponsor) sponsor,max(users.position) position,count(users.sponsor),max(users.user_name) user_name,max(package_name) package_name,sum(price) price')
            ->join('users as u', 'users.sponsor', '=', 'u.id')
            ->join('packages', 'users.package_id', '=', 'packages.id')
            ->groupBy('users.sponsor','users.position')
            ->where('users.position','!=',null)
            ->where('users.status',0)
            ->get()->toArray();

        $results = array();
        foreach ($users as $key => $element) {
            $results[$element['sponsor_name']][] = $element;
        }

        //settings
        $g_set = GeneralSettings::first();
        foreach ($results as $key => $result) {
            if (count($result) == 2) {
                //$result[0]->price;
                //dd($g_set,$result);
                $min_price = min($result[0]['price'], $result[1]['price']);
                $check_pair_availability = $min_price/$g_set->pair_amount;
                if ($check_pair_availability <= $g_set->pair_amount){
                   $amount= $check_pair_availability;
                }else{
                    $amount = $g_set->pair_amount;
                }
                //dd($amount,$check_pair_availability,$g_set->pair_amount);
                $bonus_amount = new CashWallet();
                $bonus_amount->user_id = $result[0]['sponsor'];
                //$bonus_amount->bonus_amount = $result[0]['no_of_pair'] * $constant * $g_set->pair_amount * $g_set->pair_percentage / 100;
                $bonus_amount->bonus_amount = $amount * 1.5;
                $bonus_amount->method = 'Pair Bonus';
                $bonus_amount->note = 'Bonus';

                $bonus_amount->save();

                User::where('sponsor', $result[0]['sponsor'])
                    ->update(['status' => 1]);
            }
        }
        //end
/*
        $users = PairCount::selectRaw('user_id,sum(no_of_pair) no_of_pair')->where('status',0)->groupBy('user_id')->get()->toArray();

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
              $constant= (($left_side_balance+$right_side_balance)/2)/($g_set['pair_amount']);
              $outstanding_balance= (($left_side_balance+$right_side_balance)/2)%($g_set['pair_amount']);


            $bonus_amount = new CashWallet();
            $bonus_amount->user_id = $user['user_id'];
            $bonus_amount->bonus_amount = $user['no_of_pair'] *$constant* $g_set->pair_amount*$g_set->pair_percentage/100;
            $bonus_amount->method = 'Pair Bonus';
            $bonus_amount->note = 'Bonus';
            $bonus_amount->save();

            PairCount::where('user_id', $user['user_id'])->where('status',0)
                ->update(['status' => 1]);
        }
*/
          $this->info('Successfully added Pair bonus.');
    }

}
