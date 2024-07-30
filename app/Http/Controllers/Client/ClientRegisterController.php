<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class ClientRegisterController extends Controller
{
    //
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('client.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->userService->registerUser($request->all());
            return redirect()->route('client.login')->with('success', __('messages.registration_success'));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
