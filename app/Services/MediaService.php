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
}