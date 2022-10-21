<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller {

    public function forgotPassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            // return [
            //     'status' => __($status)
            // ];       
            
            return redirect()->route('viewlogin')
             ->with ('message', 'Tu codigo de verificacion fue enviado');
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }

    public function reset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', RulesPassword::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                $user->tokens()->delete();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            // return response([
            //     'message' => 'La contraseña se ha restablecido.'
            // ]);

            return redirect()->route('viewlogin')
                ->with('message', 'La contraseña se cambio correctamente');
        }

        // return response([
        //     'message' => __($status)
        // ], 500);


        return redirect()->route('viewlogin')
        ->with('message', 'El link ya expiro');
    }
}
