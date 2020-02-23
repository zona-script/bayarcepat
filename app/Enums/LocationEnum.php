<?php


namespace App\Enums;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class LocationEnum
{
    public static function provinsi()
    {
        try {
            return collect(json_decode(Storage::disk('local')
                ->get('lokasi/provinsi.json')))->toArray();
        } catch (FileNotFoundException $e) {
            throw new \Exception("File Provinsi Not Found");
        }
    }

    public static function kabupaten()
    {
        try {
            return collect(json_decode(Storage::disk('local')
                ->get('lokasi/kabupaten.json')))->toArray();
        } catch (FileNotFoundException $e) {
            throw new \Exception("File Kabupaten Not Found");
        }
    }
}
