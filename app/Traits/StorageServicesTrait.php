<?php


namespace App\Traits;


use Illuminate\Support\Facades\Storage;

trait StorageServicesTrait
{
    private function saveJson($fileName, $data)
    {
        Storage::disk('local')
                ->put($fileName, collect($data)->toJson());
    }

    private function readJson($path)
    {
        $contents = Storage::disk('local')
            ->get($path);

        return collect(json_decode($contents));
    }

    private function existJson($path)
    {
        if (Storage::exists($path)) {
            return true;
        }

        return false;
    }

}
