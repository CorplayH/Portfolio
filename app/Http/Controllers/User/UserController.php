<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateUserPassword(User $user, Request $request)
    {
        $request->validate(
            [
                'oldPassword' => 'required',
                'newPassword' => 'required|min:3|confirmed',
            ],
            [
                'oldPassword.required' => 'Please enter your old password',
                'newPassword.required' => 'Please enter your new password',
                'newPassword.min' => 'Password should be at less 6 digit',
                'newPassword.confirmed' => 'The password you entered does not match',
            ]
        );
        $data['password'] = bcrypt($request->newPassword);
        if (Hash::check(($request->oldPassword), \Auth::user()->password)) {
            User::where('id', auth()->user()->id)->update($data);
            return ['code' => 1, 'message' => 'Password has changed'];
        } else {
            return ['code' => 2, 'message' => 'Old password is incorrect'];
        }
    }
}
