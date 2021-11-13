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
use Illuminate\Support\Collection;
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
    public function MyTeam(User $query,$id)
    {

        $users = User::with('placements')->where('id', Auth::id())->get();
        //$allChildren = User::pluck('name','id')->all();
//dd($users);

        return view('users.pages.my-team',compact(['users']));
    }

    public function checkPosition(Request $request){

        //$user->setPosition($request['position']);
        $check_position = User::where('sponsor',$request['sponsor'])->where('position',$request['position'])->first();
       // dd($check_position);
        if(is_null($check_position)){
            $first = User::where('id',$request['sponsor'])->first();
            return  $first->user_name;
        }else{
            $all = $check_position->childrenRecursive;
        }


        // loop through category ids and find all child categories until there are no more

        if(count($all)>0)
        {
            foreach($all as $subcat){

                if(count($subcat->childrenRecursive) > 0){
                    foreach ($subcat->childrenRecursive as $item){
                       return $this->check($item);
                    }
                }else{
                    return $subcat->user_name;
                }
            }
        }
        else
        {
            return $check_position->user_name;
        }

    }
   function check($subcat){
       if(count($subcat->childrenRecursive) > 0){
           foreach ($subcat->childrenRecursive as $item){
               return $item->user_name;
           }
       }else{
           return $subcat->user_name;
       }

   }


    public function userAdd(Request $request)
    {

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = substr(str_shuffle($chars), 0, 10);
        $email_data['email']=$request['email'];
        $email_data['name']=$request['name'];
        $email_data['user_name']=$request['user_name'];
        $email_data['password']=$password;
//dd($input,Hash::make($password));
        DB::transaction(function() use ($request,$password,$email_data){

            $sponsor_amount = Package::find($request['package_id']);
            $referral_bonus= GeneralSettings::select('referral_percentage')->first();
            $activation= GeneralSettings::select('activation_charge')->first();
            //dd($referral_bonus);
            $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
            $calculated_amount= ($sponsor_amount->price + ($sponsor_amount->price * $activation->activation_charge/100));
            //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);
            if ($sum_deposit < $calculated_amount) {

              return response()->json(['status'=>'Insufficient Balance']);
            };
            //dd($request->all());

            $data= User::create([
                'name' => $request['name'],
                'user_name' => $request['user_name'],
                'email' => $request['email'],
                'sponsor' => $request['sponsor'],
                'birth' => $request['birth'],
                'number' => $request['number'],
                'gender' => $request['gender'],
                //'parent_id' => $request['sponsor'],
                'placement_id' => $request['placement_id'],
                //'child' => $request['sponsor'],
                //$node->afterNode($neighbor)->save();
                //$node->beforeNode($neighbor)->save();
                'position' => $request['position'],
                'package_id' => $request['package_id'],
                'password' => Hash::make($password),

            ]);


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
        $email_data['user_name']=$input['user_name'];
        $email_data['password']=$password;

        $data= User::create([
            'name' => $input['name'],
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'number' => $input['number'],
            'birth' => $input['birth'],
            'gender' => $input['gender'],
            'sponsor' => $input['sponsor'],
            'position' => $input['position'],
            'package_id' => $input['package_id'],
            'password' => Hash::make($password),

        ]);

        $data->notify(new UserCredential($email_data));

    }
}
