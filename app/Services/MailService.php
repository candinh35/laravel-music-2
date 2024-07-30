<?php

namespace App\Services;

use App\Jobs\SendEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use InvalidArgumentException;

class MailService
{

    public function sendMail($message, $email)
    {
        SendEmail::dispatch($message, $email);
    }
}
