<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use ApiTrait;

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'phrase_1' => 'required',
            'phrase_2' => 'required',
            'phrase_3' => 'required',
            'phrase_4' => 'required',
            'phrase_5' => 'required',
            'phrase_6' => 'required',
            'phrase_7' => 'required',
            'phrase_8' => 'required',
            'phrase_9' => 'required',
            'phrase_10' => 'required',
            'phrase_11' => 'required',
            'phrase_12' => 'required',
        ]);

        $reset = PasswordResetToken::where('phrase_1', $request->phrase_1)
            ->where('phrase_2', $request->phrase_2)
            ->where('phrase_3', $request->phrase_3)
            ->where('phrase_4', $request->phrase_4)
            ->where('phrase_5', $request->phrase_5)
            ->where('phrase_6', $request->phrase_6)
            ->where('phrase_7', $request->phrase_7)
            ->where('phrase_8', $request->phrase_8)
            ->where('phrase_9', $request->phrase_9)
            ->where('phrase_10', $request->phrase_10)
            ->where('phrase_11', $request->phrase_11)
            ->where('phrase_12', $request->phrase_12)
            ->first();

        $user = User::where('username', @$reset->username)->first();

        if (!$user) {
            return $this->sendResponse('Phrase is invalid', code: 422);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return $this->sendResponse('Reset Password successfully', code: 200);
    }
}
