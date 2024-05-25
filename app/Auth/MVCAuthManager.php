<?php

namespace App\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class MVCAuthManager
{
    public abstract function authenticate(Request $request);

    public abstract function logout(Request $request);

    public abstract function changePass(Request $request);

    public abstract function updatePassword(Request $request);

    public abstract function editProfile(Request $request);

    public abstract function updateProfile(Request $request);

    public function checkCredentialsByEmail($email, $password, $guard = null)
    {
        return Auth::guard($guard)->validate(['email' => $email, 'password' => $password]);
    }

}
