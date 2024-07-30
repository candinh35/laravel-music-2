<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
{
    //
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('client.login');
    }

    // login
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        // dd($this->userService->loginAdmin($credentials));
        if ($this->authService->loginClient($credentials)) {
            return redirect()->route('client.home');
        } else {
            return back()->withErrors([
                'message' => __('messages.login_fail'),
            ]);
        }
    }

    // logout
    public function logout(Request $request)
    {
        $this->authService->logoutClient($request);

        return redirect()->route('client.login');
    }
}
