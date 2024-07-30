<?php

namespace App\Services;

use App\Models\User;
use App\Services;
use Illuminate\Support\Facades\Auth;

class UserService extends BaseService
{
    private $mailService;
    /**
     * User constructor
     */
    public function __construct(User $User, MailService $mailService)
    {
        $this->mailService = $mailService;
        parent::__construct($User);
    }

    public function createUser($data)
    {
        $data['password'] = bcrypt($data['password']);

        parent::create($data);
    }

    public function updateUser($data, $id)
    {
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }

        parent::update($data, $id);
    }

    public function registerUser($data)
    {
        $data['password'] = bcrypt($data['password']);

        parent::create($data);

        $message = ['name' => $data['name']];

        $this->mailService->sendMail($message, $data['email']);
    }
}
