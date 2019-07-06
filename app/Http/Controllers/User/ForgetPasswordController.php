<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Notifications\forgetPassword;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgetPasswordController extends Controller
{
    //step 1: Enter email page
    public function emailPage()
    {
        return view('backend.forgetPassword');
    }

    //step 2: check email is valid & create token
    public function checkEmail(Request $request)
    {
        // check if email is valid
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // create password reset token,
            // this function will automatic insert userEmail & encrypted token to password_reset table
            app('auth.password.broker')->createToken($user);
            //get token from the table
            $token = DB::table('password_resets')->where('email', $user->email)->value('token');
            // Email user by using notification with the token
            $user->notify(new forgetPassword($token));
            return redirect('/door')->withInput()->with('success', 'Email has been send');
        } else {
            return redirect('/getEmail')->withInput()->with('error', 'The account does not exist');
        }
    }

    //step 3: Load reset password page
    public function resetPasswordPage(Request $request)
    {
        // get token in url
        $token = $request->route('token');
        // check token is valid & get data
        $data = DB::table('password_resets')->where('token', $token)->first();
        // get token time
        $oldTime = carbon::parse($data->created_at);
        // check if the token is expired
        if ($data || $oldTime->addMinute(15) < now()) {
            return redirect()->route('loginPage')->with('error', 'link expired');
        } else {
            //compact data witch include ('token') to reset page
            return view('backend.resetPassword', compact('data'));
        }
    }

    //step 4: Reset password
    public function restPassword(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'newPassword' => 'required|min:3|confirmed',
            ],
            [
                'email.required' => 'Please enter your email',
                'email.email' => 'Please enter your email',
                'newPassword.required' => 'Please enter your new password',
                'newPassword.min' => 'Password should be at less 6 digit',
                'newPassword.confirmed' => 'The password you entered does not match',
            ]
        );
        // get user email by checking token
        $tokenUser = Db::table('password_resets')->where('token', $request->token)->first();
        if (!$tokenUser) {
            return redirect()->route('loginPage')->with('error', 'wops! something goes wrong here. Please try again');
        } else {
            $user = User::where('email', $tokenUser->email)->first();
        }
        // update password
        if ($user) {
            $user->update(['password' => bcrypt($request->newPassword)]);
            //delete token
            Db::table('password_resets')->where('email', $request->email)->delete();
        } else {
            return redirect()->route('loginPage')->with('error', 'wops! something goes wrong here. Please try again');
        }

        return redirect()->route('loginPage')->with('success', 'Password has been updated');
    }
}

