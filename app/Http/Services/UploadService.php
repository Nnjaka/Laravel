<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Http\UploadedFile;

class UploadService
{
    /**
     * @param SocialContract $socialUser
     * @return string
     * @throws Exception
     */
    public function uploadFile(UploadedFile $file): string
    {
        $completedFile = $file->storeAs('news', $file->hashName(), 'public');
        if (!$completedFile) {
            throw new Exception("File wasn't upload");
        }

        return $completedFile;
    }
}
