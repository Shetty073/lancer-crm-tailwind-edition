<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{
    protected $redirectTo = '/';

    public function index()
    {
        // If the users table is empty then redirect
        // to the signup page.
        $users = User::all();
        if (count($users) < 1) {
            return redirect()->route('signup.index');
        }

        return view('signin.index');
    }

    public function signin(Request $request)
    {
        $request->flashExcept('password');

        $credentials = $request->only('email', 'password');

        $remember = false;

        if ($request->has('remember')) {
            $remember = true;
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            # register the user
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|confirmed',
                'photo' => 'image|max:1999',
            ]);

            // create user
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => '',
            ]);
            $user->setPasswordAttribute($request->input('password'));
            $user->save();

            // handle image if its present
            if ($request->hasFile('photo')) {
                $fileName = $request->file('photo')->getClientOriginalName();
                $fileExtension = $request->file('photo')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . $user->id . '_' . time() . '.' . $fileExtension;
                $path = $request->file('photo')->storeAs('public/profile_picture', $fileNameToStore);
                $user->photo_url = $fileNameToStore;
                $user->save();
            }

            // login the user and redirect to dashboard
            Auth::login($user);
            return redirect()->to('/');
        }

        $request->flashExcept(['password', 'password_confirmation']);
        return view('signup.index');
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin.index');
    }

    public function myAccount()
    {
        return view('myaccount.index');
    }

    public function updateMyPersonalDetails(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'photo' => 'image|max:1999',
        ]);

        $user = User::findorfail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // handle image if its present
        if ($request->hasFile('photo')) {
            // delete old photo if present
            if($user->photo_url !== null) {
                $file_path = public_path('storage/profile_picture/' . $user->photo_url);
                @unlink($file_path);
            }

            // now add enw photo
            $fileName = $request->file('photo')->getClientOriginalName();
            $fileExtension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . $user->id . '_' . time() . '.' . $fileExtension;
            $path = $request->file('photo')->storeAs('public/profile_picture', $fileNameToStore);
            $user->photo_url = $fileNameToStore;
            $user->save();
        }

        return back()->with('success', 'You have successfully changed your personal details.');
    }

    public function changeMyPassword(Request $request, $id)
    {
        $this->validate($request, [
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed',
        ]);

        $user = User::findorfail($id);
        $user->setPasswordAttribute($request->input('password'));
        $user->save();

        // if(Hash::check($request->input('current_password'), $user->password)) {

        // } else {
        //     return back()->withErrors();
        // }

        return back()->with('success', 'You have successfully changed your password.');
    }
}
