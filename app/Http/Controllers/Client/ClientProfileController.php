<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    //
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = $this->userService->getById(Auth::id());

        return view('client.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        //
        try {
            $this->userService->update($request->all(), Auth::id());
            return redirect()->route('client.profile')->with('success', __('messages.update_success', ['attribute' => 'profile']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    public function updatePass(ChangePasswordRequest $request)
    {
        //
        try {
            $this->userService->updateUser($request->all(), Auth::id());
            return redirect()->route('client.profile')->with('success', __('messages.change_pass_success'));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
