<?php

namespace App\Console\Commands;

use App\Models\CashWallet;
use App\Models\User;
use App\Models\GeneralSettings;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use function Sodium\add;
use Auth;

class DailyBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily package bonus';

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

        $users = User::with('packages')->get()->toArray();
        $sponsor_bonus= GeneralSettings::select('royality_bonus')->first();

        //$daily_bonus= User::where('id',Auth::id())->first();
        //dd($daily_bonus->packages->price);
        //dd($sponsor_bonus['royality_bonus']);

        foreach ($users as $user) {
            if (!empty($user['packages'])){
                $date1 = new DateTime($user['created_at']);
                $date2 = new DateTime(Carbon::now()->addDay(1));
                $days  = $date2->diff($date1)->format('%a');

                if ($days <= $user['packages']['duration']){

                    CashWallet::create([
                        'user_id'=>$user['id'],
                        'bonus_amount'=>($user['packages']['return_percentage']*$user['packages']['price'])/100,
                        'method'=>'daily bonus',
                        'note'=>'Bonus',
                    ]);
                    if ($user['sponsor']){
                        CashWallet::create([
                            'user_id'=>$user['sponsor'],
                            'bonus_amount'=>(($user['packages']['return_percentage']*$user['packages']['price'])/100)*$sponsor_bonus['royality_bonus']/100,
                            'method'=>'royality sponsor bonus',
                            'note'=>'Bonus',
                        ]);
                    }
                    $placement_id= $user['placement_id'];
                    $g_set = GeneralSettings::first();
                    $data=($user['packages']['return_percentage']*$user['packages']['price'])/100;

                    $income=[$g_set->level_1,$g_set->level_2,$g_set->level_3,$g_set->level_4,$g_set->level_5];

                    $i=0;
                    while($i < 5 && $placement_id != ''){

                        $user = User::where('user_name',$placement_id)->first('id');

                        $bonus_amount = new CashWallet();
                        $bonus_amount->user_id = (int)$user->id;
                        $bonus_amount->bonus_amount = $income[$i]*$data/100;
                        $bonus_amount->method = 'Level Bonus';
                        $bonus_amount->note = 'Bonus';
                        $bonus_amount->save();

                        $next_id= $this->find_placement_id($placement_id);
                       // dd($next_id,$placement_id);
                        $placement_id = $next_id;
                        $i++;
                    }

                }

            }
        }

        $this->info('Successfully added daily bonus.');

      //  $use=((($user['packages']['return_percentage']*$user['packages']['price'])/100)*$sponsor_bonus['royality_bonus']/100)*$income[$i]/100;
    }
    public function find_placement_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();
        return $user_id->placement_id;
    }

}
