<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

// format date
function formatDate($datetString)
{
    $timestamp = strtotime($datetString);

    return date('d/m/Y', $timestamp);
}
