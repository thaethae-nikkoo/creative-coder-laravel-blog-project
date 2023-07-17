<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','max:255','min:3'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email'=>['required','max:255',Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'min:8', 'same:password'],
        ], [
           'username.unique' => 'This username is already taken.',
           'email.unique' => 'A user with this email is already exist.',
        'confirm_password.same' => 'Confirm password does not match the password.',
        ]);

        // $data['password'] = Hash::make($request->password);
        unset($data['confirm_password']);

        $user = User::create($data);
        auth()->login($user);
        session()->flash('success', $user->name. '! You\'re are successfully registered.');
        return redirect('/');

    }
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back()->with('error', 'Invalid User email or password.');

        } else {
            return redirect('/');
        }

    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
