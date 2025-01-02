<?php

namespace App\Traits;

use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    protected function uploadBase64FromRequest($requestName, $folderPath)
    {
        if (!request()[$requestName]) return null;

        $fileRequest = request()[$requestName];
        $posExt = strpos($fileRequest, '/');
        $posExtEnd = strpos($fileRequest, ';');

        $extension = substr($fileRequest, ($posExt + 1), (($posExtEnd) - ($posExt + 1)));

        if ($extension != 'jpeg' && $extension != 'jpg' && $extension != 'png')
            throw ValidationException::withMessages([
                $requestName => ['file must be jpg/jpeg/png'],
            ]);

        $fileRequest = str_replace('data:image/' . $extension . ';base64,', '', $fileRequest);
        $fileRequest = str_replace(' ', '+', $fileRequest);

        // Image Size
        $fileSize = strlen($fileRequest);
        if ($fileSize > 2048000)
            throw ValidationException::withMessages([
                $requestName => ['Maximal file is 2MB'],
            ]);

        $fileData = base64_decode($fileRequest);

        $fileName = rand(1000, 9999) . time() . '.' . $extension;
        $fileLocation = $folderPath . '/' . $fileName;

        // Storage::disk('public')->put($fileLocation, $fileData);

        // Image::make('storage_tenant/tenant_'.tenant('id').'/app/public/' . $fileLocation)
        // ->resize(500, null, function($constraint) {
        //     $constraint->aspectRatio();
        // })
        // ->crop(500, 500)
        // ->save('storage_tenant/tenant_'.tenant('id').'/app/public/' . $fileLocation);

        return $fileName;
    }

    protected function uploadFileFromRequest($requestName, $folderName)
    {
        if (!$file = request()->file($requestName)) return null;

        $filename = rand(1000, 9999) . time() . '.' . $file->getClientOriginalExtension();

        $fileLocation = $file->storeAs($folderName, $filename, 'public');
        // Image::make('storage/blogs/59161735727804.png')
        //     ->resize(400, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     })
        //     ->save('storage/blogs/59161735727804.png');

        return $filename;
    }
}
