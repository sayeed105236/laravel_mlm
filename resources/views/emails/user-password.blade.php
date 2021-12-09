@extends('emails.layouts.app')

@section('content')
<div class="content">
    <td align="left">
        <table border="0" width="80%" align="center" cellpadding="0" cellspacing="0" class="container590">
            <tr>
                <td align="left" style="color: #888888; width:20px; font-size: 16px; line-height: 24px;">
                    <!-- section text ======-->
{{--                    <h4 style="text-align: center;"> <span style="border-bottom: 1px solid dimgray;">{{ app_name() }}</span></h4>--}}

                    <p style="line-height: 24px; margin-bottom:15px;">
                        Dear {{$name}}! <br/>
                        Congratulations!
                        .
                    </p>
                      <p style="line-height: 24px; margin-bottom:15px;">
                        Your account has been setup and you are ready to begin earning with Coinexxpro.
                          </p>

                    <p style="line-height: 24px; margin-bottom:20px;">
                        Please don't share your credentials with anyone and after login change your password. Your account temporary login credential below-
                    </p>
                    <div style="text-align: center; color: black; font-weight: bold; border: 1px solid black; padding: 15px ">
                        <p>User Name: {{$user_name}}</p>
                        <p>User Email: {{$email}}</p>
                        <p>User Password: {{$user_password}}</p>
                    </div>

                    <p style="line-height: 24px; margin-bottom:20px;margin-top:20px">
                        Thank you for using our application!
                          If you need any further assistance, please contact our support team
                    </p>

                    <p style="line-height: 24px">
                        Regards, <br/>


                        ---
                        CoinexxPro
                        www.coinexxpro.com

                        {{--@yield('title', app_name())--}}
                    </p>

                    <br/>

                    <p class="small" style="line-height: 24px; margin-bottom:20px;">
                            If you’re having trouble to access your account , please communicate with Admin.
                    </p>

                    {{--<p class="small" style="line-height: 24px; margin-bottom:20px;">
                        <a href="{{ $user_password }}" target="_blank" class="lap">
                            {{ $user_password}}
                        </a>
                    </p>--}}

                    @include('emails.layouts.footer')
                </td>
            </tr>
        </table>
    </td>
</div>
@endsection
