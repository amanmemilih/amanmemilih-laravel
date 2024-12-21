<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

trait ApiTrait
{
    public function sendResponse($message, $data = null, $code = 200, $showDataWhenNull = false)
    {
        $response = ['code' => $code, 'message' => $message, 'success' => str_starts_with((string)$code, '2')];
        if ($data || $showDataWhenNull) $response = array_merge($response, ['data' => $data]);

        return response()->json($response, 200);
    }

    protected function setCookies($key, $value)
    {
        return Cookie::make(
            $key, // Name
            $value, // Value
            120, // time to expire
            '/', // Path
            config('session.domain'), // Domain
            false, // Secure
            true, // httpOnly
            false, // Raw
            'strict' //same-site   <-----
        );
    }
}
