<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('admin.login');
    }

    // login
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        // dd($this->userService->authAdmin($credentials));
        if ($this->authService->loginAdmin($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors([
                'message' => __('messages.login_fail'),
            ]);
        }
    }

    // logout
    public function logout(Request $request)
    {
        $this->authService->logoutAdmin($request);

        return redirect()->route('admin.login');
    }
}
