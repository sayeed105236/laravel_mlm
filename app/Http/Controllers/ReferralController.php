<?php


namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\AddMoney;
use App\Models\CashWallet;
use App\Models\Package;
use App\Models\GeneralSettings;
use App\Models\PairCount;
use App\Notifications\UserCredential;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;

class ReferralController extends Controller implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

  public function __construct(StatefulGuard $guard)
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
      $this->guard = $guard;
  }
    public function index($id)
    {
      //  $users = User::where('package_id')->get()->toArray();
      //  dd($user['packages']);
        //dd($id,Auth::id());
      //  $g_set = GeneralSettings::first();
       //$data=$g_set['royality_bonus'];
       //$data=$g_set->pair_percentage;
       //dd($data);
      $users=User::where('sponsor',Auth::id())->get();

      return view('users.pages.referrals',compact('users'));
    }
    public function MyTeam(User $query,$id)
    {

        $user = User::where('id', $id)->first();
        //$allChildren = User::pluck('name','id')->all();
//dd($users);
        return view('users.pages.my-team',compact(['user']));
    }

    public function checkPosition(Request $request){

        //$user->setPosition($request['position']);
        $check_position = User::where('sponsor',$request['sponsor'])->where('position',$request['position'])->orderBy('id','desc')->first();
       //dd($check_position);
        if(is_null($check_position)){
            $first = User::where('id',$request['sponsor'])->orderBy('id','desc')->first();
            return  $first->user_name;
        }else{
            $all = $check_position->childrenRecursive;
        }


        // loop through category ids and find all child categories until there are no more

        if(count($all)>0)
        {
            foreach($all as $subcat){
                if(count($subcat->childrenRecursive) > 0){
                    //dd($subcat->childrenRecursive());
                    foreach ($subcat->childrenRecursive as $item){
                       return $this->check($item);
                    }
                }else{
                    return $subcat->user_name;
                }
            }
            //dd($all);
        }
        else
        {
            return $check_position->user_name;
        }

    }
   public function check($subcat){
       if(count($subcat->childrenRecursive) > 0){
           foreach ($subcat->childrenRecursive as $item){
           return  $this->check($item);
               //return $item->user_name;
           }
       }else{
           return $subcat->user_name;
       }

   }


    public function userAdd(Request $request)
    {
         $request->validate([
             'name' => 'required|min:8',
             'user_name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'number' => 'required',
            'birth' => 'required|date_format:Y-m-d|before:today|before:'.\Carbon\Carbon::today()->subYears(18),
            'gender' => 'required',
            'package_id' => 'required',
            'country'=>'required',
            'sponsor' => 'required',
            'position' => 'required',
            'placement_id' => 'required',
        ],
            [
              // 'birth.before' => 'The :attribute must be a date before 18 years ago.',
               // 'name.required'=> 'Your First Name is Required', // custom message
               // 'name.min'=> 'First Name Should be Minimum of 8 Character', // custom message
                //'email.required'=> 'Your Last Name is Required' // custom message
            ]
        );


            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $password = substr(str_shuffle($chars), 0, 10);
            $email_data['email']=$request['email'];
            $email_data['name']=$request['name'];
            $email_data['user_name']=$request['user_name'];
            $email_data['password']=$password;
            DB::transaction(function() use ($request,$password,$email_data){

                $sponsor_amount = Package::find($request['package_id']);
                $referral_bonus= GeneralSettings::select('referral_percentage')->first();
                $activation= GeneralSettings::select('activation_charge')->first();

                $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
                $calculated_amount= ($sponsor_amount->price + ($sponsor_amount->price * $activation->activation_charge/100));
                //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

                if ($sum_deposit < $calculated_amount) {

                   throw new \Exception("Insufficient Balance", 404);
                };

                $placement_id = $request['placement_id'];
                $position_id = $request['position'];
                $data= User::create([
                    'name' => $request['name'],
                    'user_name' => $request['user_name'],
                    'email' => $request['email'],
                    'sponsor' => $request['sponsor'],
                    'birth' => $request['birth'],
                    'country' => $request['country'],
                    'number' => $request['number'],
                    'gender' => $request['gender'],
                    //'parent_id' => $request['sponsor'],
                    'placement_id' =>$placement_id,
                    'position' => $position_id,
                    'package_id' => $request['package_id'],
                    'password' => Hash::make($password),

                ]);

                if ($position_id == 1){
                    User::where('user_name', $placement_id)
                        ->update(['left_side' => $data->user_name]);
                }else{
                    User::where('user_name', $placement_id)
                        ->update(['right_side' => $data->user_name]);
                }
                //level distribution
              //  $this->levelBonus($placement_id);
                //pair bonus
                $this->binary_count($placement_id,$position_id);


                $activation= GeneralSettings::select('activation_charge')->first();
                $wallet_amount = new AddMoney();
                $wallet_amount->user_id = Auth::id();
                $wallet_amount->amount = -($sponsor_amount->price + ($sponsor_amount->price * $activation->activation_charge/100));
                $wallet_amount->method = 'Activation Charge';
                $wallet_amount->status = 'approve';
                $wallet_amount->created_at = Carbon::now();
                $wallet_amount->save();



                $bonus_amount = new CashWallet();
                $bonus_amount->user_id = $request['sponsor'];
                $bonus_amount->bonus_amount = (($sponsor_amount->price)* $referral_bonus->referral_percentage)/100;
                $bonus_amount->method = 'Sponsor Bonus';
                $bonus_amount->save();


                $data->notify(new UserCredential($email_data));
                Session::flash('success','User has been Successfully Registered!!');


            });
        return response()->json(['success'=>'User has been Successfully Registered!!'],200);

    }

    /**
     * Level bonus
     */
  //  public function levelBonus($placement_id)
  //  {

      //  $g_set = GeneralSettings::first();
      //  $data=$g_set['royality_bonus'];

    //    $income=[$g_set->level_1,$g_set->level_2,$g_set->level_3,$g_set->level_4,$g_set->level_5];
    //    $i=0;
    //    while($i < 5 && $placement_id != ''){
      //      $user = User::where('user_name',$placement_id)->first('id');

      //      $bonus_amount = new CashWallet();
      //      $bonus_amount->user_id = (int)$user->id;
      //      $bonus_amount->bonus_amount = $income[$i]*$data/100;
      //      $bonus_amount->method = 'Level Bonus';
      //      $bonus_amount->save();

      //      $next_id= $this->find_placement_id($placement_id);
      //      $placement_id = $next_id;
      //      $i++;
      //  }

  //  }

    public function binary_count($placement_id,$pos)
    {
       if ($pos == 1){
            $pos = 'left_count';
       }else{
           $pos = 'right_count';
       }

        while($placement_id != '' && $pos != ''){

            DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");

            $this->is_pair_generate($placement_id);
            $pos= $this->find_position_id($placement_id);
            $placement_id= $this->find_placement_id($placement_id);

        }

    }
    public function find_position_id($placement_id){

            $user_id = User::where('user_name',$placement_id)->first();
            $pos= $user_id->position;
            if ($pos == 1){
                $pos = 'left_count';
            }elseif($pos == 2){
                $pos = 'right_count';
            }

            return $pos;

    }
    public function find_placement_id($placement_id){

            $user_id = User::where('user_name',$placement_id)->first();
            return $user_id->placement_id;
    }

    public function is_pair_generate($placement_id)
    {
        $user = User::where('user_name',$placement_id)->first();

        if ($user->left_count == $user->right_count){
            $data = PairCount::where('user_id',$user->id)->where('date',Carbon::today())->get()->toArray();
            $date= date('Y-m-d');
            if(count($data) > 0){
              //  DB::statement("UPDATE pair_counts SET no_of_pair = `no_of_pair`+1 WHERE date = '$date' and user_id = '$user->id'");
                DB::statement("UPDATE pair_counts SET no_of_pair = '$user->right_count' WHERE date = '$date' and user_id = '$user->id'");
            }else{
                $insert= new PairCount();
                $insert->user_id = $user->id;
                $insert->date = Carbon::today();
                $insert->no_of_pair = 1;
                $insert->save();
            }
        }

    }
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        //dd('hel');
        /* Validator::make($input, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           //'password' => $this->passwordRules(),
             'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
         ])->validate();*/
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = substr(str_shuffle($chars), 0, 10);
        $email_data['email']=$input['email'];
        $email_data['name']=$input['name'];
        $email_data['user_name']=$input['user_name'];
        $email_data['password']=$password;

        $data= User::create([
            'name' => $input['name'],
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'number' => $input['number'],
            'birth' => $input['birth'],
              'country' => $input['country'],
            'gender' => $input['gender'],
            'sponsor' => $input['sponsor'],
            'position' => $input['position'],
            'package_id' => $input['package_id'],
            'password' => Hash::make($password),

        ]);

        $data->notify(new UserCredential($email_data));

    }
}
