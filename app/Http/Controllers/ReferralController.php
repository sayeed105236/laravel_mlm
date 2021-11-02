<?php


namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\AddMoney;
use App\Models\CashWallet;
use App\Models\Package;
use App\Models\GeneralSettings;
use App\Notifications\UserCredential;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        //dd($id,Auth::id());
      $users=User::where('sponsor',Auth::id())->get();

      return view('users.pages.referrals',compact('users'));
    }
    public function MyTeam($id)
    {
        //dd($id,Auth::id());
      //$users=User::where('sponsor',Auth::id())->get();

      return view('users.pages.my-team');
    }
    public function userAdd(Request $request)
    {

      //dd($referral_bonus);
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = substr(str_shuffle($chars), 0, 10);
        $email_data['email']=$request['email'];
        $email_data['name']=$request['name'];
        $email_data['password']=$password;
//dd($input,Hash::make($password));
        DB::transaction(function() use ($request,$password,$email_data){
            $data= User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'sponsor' => $request['sponsor'],
              //'parent_id' => $request['sponsor'],
                //'child' => $request['sponsor'],
                'position' => $request['position'],
                'package_id' => $request['package_id'],
                'password' => Hash::make($password),

            ]);
            $sponsor_amount = Package::find($request['package_id']);
            $referral_bonus= GeneralSettings::select('referral_percentage')->first();
            //dd($referral_bonus);
            $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
            $calculated_amount= ($sponsor_amount->price + ($sponsor_amount->price * 10/100));
            //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);
            if ($sum_deposit < $calculated_amount) {

              return response()->json(['status'=>'Insufficient Balance']);
            };

            $wallet_amount = new AddMoney();
            $wallet_amount->user_id = Auth::id();
            $wallet_amount->amount = -($sponsor_amount->price + ($sponsor_amount->price * 10/100));
            $wallet_amount->method = 'Manual';
            $wallet_amount->status = 'approve';
            $wallet_amount->created_at = Carbon::now();
            $wallet_amount->save();



            $bonus_amount = new CashWallet();
            $bonus_amount->user_id = $request['sponsor'];
            $bonus_amount->bonus_amount = (($sponsor_amount->price)* $referral_bonus->referral_percentage)/100;
            $bonus_amount->save();


            return $data->notify(new UserCredential($email_data));
        });

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
        $email_data['password']=$password;

        $data= User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'sponsor' => $input['sponsor'],
            'position' => $input['position'],
            'package_id' => $input['package_id'],
            'password' => Hash::make($password),

        ]);

        $data->notify(new UserCredential($email_data));

    }
}
