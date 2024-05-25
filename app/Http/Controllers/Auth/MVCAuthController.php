<?php

namespace App\Http\Controllers\Auth;

use App\Auth\MVCAuthManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\MVC\MVCUserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MVCAuthController extends Controller
{
    private $authManager;

    public function __construct(MVCAuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        return $this->authManager->authenticate($request);
    }

    public function changePass(Request $request)
    {
        return $this->authManager->changePass($request);
    }

    public function updatePassword(Request $request)
    {
        return $this->authManager->updatePassword($request);
    }

    public function editProfile(Request $request)
    {
        return $this->authManager->editProfile($request);
    }

    public function updateProfile(Request $request)
    {
        return $this->authManager->updateProfile($request);
    }

    public function logout(Request $request)
    {
        return $this->authManager->logout($request);
    }
}
