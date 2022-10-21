<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebAuthController extends Controller {

    public function register(Request $request) {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // $new_user = User::create($request->all());
        // $new_user->save();

        return redirect()
        ->route('viewlogin')
        ->with('message', 'Te has registrado correctamente');
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Credenciales incorrectas.'
            ], 403);
        }

        // return response([
        //     'user' =>  $request->user(),
        //     'token' => $request->user()->createToken('secret')->plainTextToken
        // ], 200);

        return view('account',['user'=> $request->user()]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return redirect()
        ->route('viewlogin')
        ->with('message', 'La sesión se cerró correctamente.');
    }

    //* GET USER DATA
    public function user() {

        return response([
            'user' => auth()->user()
        ], 200);
    }
}