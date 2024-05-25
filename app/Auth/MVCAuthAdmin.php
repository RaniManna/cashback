<?php

namespace App\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Validator;

class MVCAuthAdmin extends MVCAuthManager
{
    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if ($this->checkCredentialsByEmail($email, $password, "admin")) {
            Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]);
            return redirect()->route('admin.dashboard')->withSuccess('Signed in');
        }

        return redirect()->route('admin.login')
            ->withErrors('invalid username or password')
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function changePass(Request $request) {
      return view('admin.profile.changepass');
    }

    public function editProfile(Request $request) {
      $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
      return view('admin.profile.editprofile', ['admin' => $admin]);
    }

    public function updateProfile(Request $request) {

        $validatedData = $request->validate([
          'email' => 'required|email|max:255',
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
        ]);

        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        $admin->email = $request->email;
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->save();

        Session::flash('success', 'Profile updated successfully!');

        return redirect()->back();
      }

    public function updatePassword(Request $request) {
      $messages = [
          'password.required' => 'The new password field is required',
          'password.confirmed' => "Password does'nt match"
      ];
      $validator = Validator::make($request->all(), [
          'old_password' => 'required',
          'password' => 'required|confirmed'
      ], $messages);
      // if given old password matches with the password of this authenticated user...
      if(Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
          $oldPassMatch = 'matched';
      } else {
          $oldPassMatch = 'not_matched';
      }
      if ($validator->fails() || $oldPassMatch=='not_matched') {
          if($oldPassMatch == 'not_matched') {
            $validator->errors()->add('oldPassMatch', true);
          }
          return redirect()->route('admin.changePass')
                      ->withErrors($validator);
      }

      // updating password in database...
      $user = Admin::findOrFail(Auth::guard('admin')->user()->id);
      $user->password = bcrypt($request->password);
      $user->save();

      Session::flash('success', 'Password changed successfully!');

      return redirect()->back();
    }
}
