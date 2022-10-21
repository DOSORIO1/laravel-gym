<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller {

    public function sendVerificationEmail(Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'El correo ya está verificado'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'link-verificacion-enviado'];
    }

    public function verify(EmailVerificationRequest $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'El correo ya se encuentra verificado'
            ];
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'message' => 'El correo se verificó exitosamente'
        ];
    }
}
