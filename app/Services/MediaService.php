<?php

namespace App\Services;


class MediaService
{
    public static function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/images', $filename);
        $link = url('storage/images/' . $filename);

        return $link;
    }

    public static function uploadFile($file)
    { 
        $filename = $file->hashName();
        $file->storeAs('public/files', $filename);
        $link = url('storage/files/' . $filename);

        return $link;
    }
}