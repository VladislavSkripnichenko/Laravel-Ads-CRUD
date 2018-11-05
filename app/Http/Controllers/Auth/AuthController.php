<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

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
        $rules_pass = ['username' => 'required|string|min:6'];

        $user_exist = $this->validation($authdata, $rules_user);
        $password_valid = $this->validation($authdata, $rules_pass);

        if ($user_exist->fails()) {
            $this->login($request);
            return redirect()->back();
        } else {
            if ($password_valid->fails()) {
                return redirect()->back();
            } else {
                if ($this->create($authdata)) {
                    $this->login($request);
                }
            }
        }
    }

    private function validation($authdata, $rules)
    {
        return Validator::make($authdata, $rules);
    }
}
