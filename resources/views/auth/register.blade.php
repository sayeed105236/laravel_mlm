<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <?php
              $packages= App\Models\Package::all();
              //dd($packages);
              $users= App\Models\User::all();

             ?>
            <div class="mt-4">
              <label for="custom select">Select Sponsor</label>
              <select onchange="select_position()" class="block mt-1 w-full" name="package_id" id="sponsor">
                <option label="Choose Package"></option>
                @foreach ($packages as $package)

                  <option value="{{$package->id}}">{{$package->name}}</option>
                @endforeach

              </select>
            </div>


            <div class="mt-4">
              <label for="custom select">Select Sponsor</label>
              <select onchange="select_position()" class="block mt-1 w-full" name="sponsor" id="sponsor">
                <option label="Choose sponsor"></option>
                @foreach ($users as $user)

                  <option value="{{$user->name}}">{{$user->name}}</option>
                @endforeach

              </select>
            </div>

            <div class="mt-4">
              <label for="custom select">Select Position</label>
              <select  class="block mt-1 w-full" name="position" id="position">
                <option label="Choose position"></option>


                  <option value="Right">Right</option>
                  <option value="Left">Left</option>
              </select>
            </div>

          <!--  <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div> -->

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<script type="text/javascript">
function select_position(){
 var a= document.getElementById('sponsor').value;
 //console.log(a);
 var b = '<?php echo Auth::user() ?>';
 console.log(b);
}
</script>
