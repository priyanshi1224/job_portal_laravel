<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Psy\CodeCleaner\ReturnTypePass;

class AccountController extends Controller
{
    public function registerPage(Request $req)
    {
        return view('front.Accounts.register');
    }


    public function registerUser(UserRequest $req)
    {
        $user = DB::table('users')
            ->insert([
                'name' => $req->username,
                'email' => $req->useremail,
                'password' => Hash::make($req->password)
            ]);

        session()->flash('success', 'you have registerd successfully');

        if ($user) {
            return redirect()->route('account.loginPage');
        }
    }


    public function loginPage(Request $req)
    {
        return view('front.Accounts.login');
    }

    public function authenticate(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'useremail' => 'required|email',
            'password' => 'required'
        ]);


        if ($validator->passes()) {
            if (Auth::attempt(['email' => $req->useremail, 'password' => $req->password])) {
                return redirect()->route('account.profile');
            } else {
                return redirect()->route('account.loginPage')->with('error', 'either Emial/Password is incorrect');
            }
        } else {
            return redirect()
                ->route('account.loginPage')
                ->withErrors($validator)
                ->withInput($req->only('useremail'));
        }
    }

    public function profile()
    {
        return view('front.Accounts.profile');
    }
}