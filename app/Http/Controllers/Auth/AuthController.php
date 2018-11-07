<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'username';
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function auth(Request $request)
    {
        $authdata = $request->all();

        $rules_user = ['username' => 'required|string|max:255|unique:users'];
        $rules_pass = ['password' => 'required|string|max:255'];

        $user_exist = $this->validation($authdata, $rules_user);
        $password_valid = $this->validation($authdata, $rules_pass);

        if ($user_exist->fails()) {
            $this->login($request);
            if (Auth::check()){
                return redirect()->back();
            }else{
                return redirect()->back()->withErrors($user_exist->errors());
            }
        } else {
            if ($password_valid->fails()) {
                return redirect()->back()->withErrors($password_valid->errors());
            } else {
                if ($this->create($authdata)) {
                    $this->login($request);
                    return redirect()->back();
                }
            }
        }
    }

    private function validation($authdata, $rules)
    {
        return Validator::make($authdata, $rules);
    }
}
