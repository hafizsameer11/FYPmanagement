<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'approved' => false,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard'); // Redirect to a dashboard or home page
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $type=$request->type;
        $user=User::where('email',$request->email)->latest()->first();
        if($user){  if($user->role==$type){
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard');
            }

        }else{
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
        }else{
            return redirect()->back()->with('error', 'User Does Not exists');
        }


        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
