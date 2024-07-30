<?php

namespace App\Services;

use App\Models\User;
use App\Services;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function loginAdmin($credentials)
    {
        return Auth::guard('admin')->attempt($credentials);
    }

    public function loginClient($credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logoutAdmin($request)
    {
        Auth::guard('admin')->logout();

        $request->session()->regenerateToken();
    }

    public function logoutClient($request)
    {
        Auth::logout();

        $request->session()->regenerateToken();
    }
}
