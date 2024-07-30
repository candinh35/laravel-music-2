<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{

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
    public function index(Request $request)
    {
        //
        $users = $this->userService->getPaginateFilterByName($limit = PER_PAGE_OPTION_ONE, null, trim($request->query('filter')));

        return view('admin.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('users.store');
        //
        return view('admin.user_create_update', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        // $validatedData = $request->validated();
        try {
            $this->userService->createUser($request->all());
            return back()->with('success', __('messages.create_success', ['attribute' => 'user']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        abort(400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // call service get by id
        $user = $this->userService->getById($id);

        $action = route('users.update', ['user' => $id]);

        return view('admin.user_create_update', compact('user', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        try {
            if($request->password){
                $this->userService->update($request->all(), $id);
            }else{
                $this->userService->update($request->except(['password']), $id);
            }
            return redirect()->route('users.index')->with('success', __('messages.update_success', ['attribute' => 'user']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $this->userService->delete($id);
            return redirect()->route('users.index')->with('success', __('messages.delete_success', ['attribute' => 'user']));
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
