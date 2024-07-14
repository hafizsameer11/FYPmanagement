<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->role = $request->role;
        $user->save();
        if($user){
            return redirect()->route('user.index')->with('success', 'User created successfully.');

        }else{
            return redirect()->route('user.index')->with('error', 'User creation failed.');
        }

        // Redirect to the index page with success message
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data

        // Update the user
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password); // Hash the password

        }

        $user->role = $request->role;
        $user->save();
        if($user){
            return redirect()->route('user.index')->with('success', 'User updated successfully.');
        }else{
            return redirect()->route('user.index')->with('error', 'User update failed.');
        }


        // Redirect to the index page with success message
    }

    public function destroy($id)
    {
        // Find the user and delete
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect to the index page with success message
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
