<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Traits\ApiTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use ApiTrait;

    public function index(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user)
            return $this->sendResponse('Invalid credentials!', code: 401);

        if ($user->username_verified_at == null)
            return $this->sendResponse('Your account not registered', code: 422);

        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return $this->sendResponse('Invalid credentials!', code: 401);
        }

        $user = Auth::user();
        $data['token'] = $user->createToken(env("APP_KEY"))->plainTextToken;
        $data['user'] = UserResource::make($user);

        return $this->sendResponse('Login successfully', data: $data);
    }

    public function generateRecoveryKey(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user)
            return $this->sendResponse('User not found!', code: 422);

        if ($user->username_verified_at != null)
            return $this->sendResponse('Your account already registered', code: 422);

        $response = Http::get('https://www.wordiebox.com/api/words?country=indonesian&number=12');

        $data = PasswordResetToken::updateOrCreate(
            ['username' => $user->username],
            [
                'phrase_1' => explode(' ', strtolower($response->json()[0]['Word']))[0],
                'phrase_2' => explode(' ', strtolower($response->json()[1]['Word']))[0],
                'phrase_3' => explode(' ', strtolower($response->json()[2]['Word']))[0],
                'phrase_4' => explode(' ', strtolower($response->json()[3]['Word']))[0],
                'phrase_5' => explode(' ', strtolower($response->json()[4]['Word']))[0],
                'phrase_6' => explode(' ', strtolower($response->json()[5]['Word']))[0],
                'phrase_7' => explode(' ', strtolower($response->json()[6]['Word']))[0],
                'phrase_8' => explode(' ', strtolower($response->json()[7]['Word']))[0],
                'phrase_9' => explode(' ', strtolower($response->json()[8]['Word']))[0],
                'phrase_10' => explode(' ', strtolower($response->json()[9]['Word']))[0],
                'phrase_11' => explode(' ', strtolower($response->json()[10]['Word']))[0],
                'phrase_12' => explode(' ', strtolower($response->json()[11]['Word']))[0],
                'created_at' => Carbon::today(),
            ],
        );

        return $this->sendResponse('Generate Recovery Key successfully', data: $data);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
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

        $user = User::where('username', $request->username)->first();

        if (!$user)
            return $this->sendResponse('User not found!', code: 422);

        if ($user->username_verified_at != null)
            return $this->sendResponse('Your account already registered', code: 422);

        if (
            $request->phrase_1 == @$user->token->phrase_1 &&
            $request->phrase_2 == @$user->token->phrase_2 &&
            $request->phrase_3 == @$user->token->phrase_3 &&
            $request->phrase_4 == @$user->token->phrase_4 &&
            $request->phrase_5 == @$user->token->phrase_5 &&
            $request->phrase_6 == @$user->token->phrase_6 &&
            $request->phrase_7 == @$user->token->phrase_7 &&
            $request->phrase_8 == @$user->token->phrase_8 &&
            $request->phrase_9 == @$user->token->phrase_9 &&
            $request->phrase_10 == @$user->token->phrase_10 &&
            $request->phrase_11 == @$user->token->phrase_11 &&
            $request->phrase_12 == @$user->token->phrase_12
        ) {
            $user->username_verified_at = Carbon::today();
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::loginUsingId($user->id);
            $data['token'] = $user->createToken(env("APP_KEY"))->plainTextToken;
            $data['user'] = UserResource::make($user);

            return $this->sendResponse('Register successfully', data: $data, code: 200);
        }

        return $this->sendResponse('Phrase is invalid', code: 422);
    }

    public function credentials(Request $request)
    {
        $user = Auth::user();
        $data['token'] = $request->bearerToken();
        $data['user'] = UserResource::make($user);

        return $this->sendResponse('Login successfully', data: $data);
    }

    public function logout(Request $request)
    {
        @Auth::guard('web')->logout();
        $request->user()->tokens()->delete();
        // @$request->session()->invalidate();
        // $request->session()->regenerateToken();

        Cookie::forget('XSRF-TOKEN');
        $cookie = Cookie::forget('laravel_session');
        return $this->sendResponse('Logout successfully')->withCookie($cookie)->withoutCookie('laravel_session');
    }
}
