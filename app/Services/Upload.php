<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class Upload extends Controller
{
    /**
     * Upload de arquivos
     *
     * @param UploadedFile $file
     * @return false|string
     */
    public static function uploadFile(UploadedFile $file)
    {
        if ($file->isValid()) {
            return $file->store('avatars', 'public');
        }
    }
}