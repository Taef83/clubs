<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Services\ImageService;

trait UploadImages
{
    public function upload(UploadedFile $file, string $path = 'files', string $slug = 'dummy slug')
    {
        $slug = rand(1111,11111);
        $currentDate = Carbon::now()->toDateString();
        $extension = $file->getClientOriginalExtension();
        $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $extension;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $file->move($path, $imageName);
        return '/'. $path . '/' . $imageName;
    }

    public function uploadImageAsBase64(string $imageBase64)
    {
        $extension = explode('/', mime_content_type($imageBase64))[1];
        $image = str_replace('data:image/'.$extension.';base64,', '', $imageBase64);
        $image = str_replace(' ', '+', $image);
        $imageName = time().rand(1,9999).'.'.$extension;
        $path      = public_path(). '/uploads/';
        $base64    = base64_decode($image);
        File::put($path . $imageName, $base64);
        return @$this->createImage([
            'type'          => 'base64',
            'path'          => 'uploads',
            'full_path'     => '/uploads/' . $imageName,
            'base_code'     => $imageBase64,
            'file_type'     => $extension,
            'file_name'     => $imageName
        ])->id;
        
    }

    public function removeOldImage(string $path): bool
    {
        if (File::exists($path)) {
            return File::delete($path);
        }
        return false;
    }

    public function createImage($data)
    {
        $imageService = app()->make(ImageService::class);
        return $imageService->create($data);
    }
}
