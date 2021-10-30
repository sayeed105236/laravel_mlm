<?php

namespace App\Actions\Fortify;

use App\Exceptions\GeneralException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Notifications\UserCredential;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

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
//dd($input,Hash::make($password));
        DB::transaction(function() use ($input,$password,$email_data){
            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'sponsor' => $input['sponsor'],
                'position' => $input['position'],
                'package_id' => $input['package_id'],
                'password' => Hash::make($password),

            ]);

          // return $data->notify(new UserCredential($email_data));
        });

    }
}
