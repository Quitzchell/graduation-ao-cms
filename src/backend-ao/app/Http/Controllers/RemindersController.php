<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;

class RemindersController extends Controller
{
    public function postRemind(PasswordBroker $broker): \Illuminate\Http\JsonResponse
    {
        $response = $broker->sendResetLink(request()->only('email'), function (Message $message) {
            $message->from("noreply@{$_SERVER['SERVER_NAME']}");
            $message->subject('Password Reset');
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return response()->json(['status' => 'ok']);
            default:
                return response()->json(['status' => 'error']);
        }
    }

    public function postReset(Request $request, PasswordBroker $broker): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

        $response = $broker->reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect()->to(config('component-skins.prefix'));
            default:
                return redirect()->back()->with('error', Lang::get($response));
        }
    }
}
