<?php

namespace App\Services;


use App\Services\Interfaces\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreImageService implements StoreImage
{

    public function getUploadedFileName(Request $request, string $requestField): string
    {
        $originName = $request->file($requestField)->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $request->file($requestField)->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;

        return $fileName;
    }

    public function StoreImage(Request $request, $user, string $requestField): string
    {


            $request->validate([
                'avatar' => ['sometimes', 'image', 'mimes:jpeg,png,jpg', 'max:5000'],
            ]);

            $oldPath = str_replace('storage', 'public', $user->avatar);
            Storage::delete($oldPath);


            $path = Storage::putFileAs('public/images/user_profile', $request->file('avatar'),
                $this->getUploadedFileName($request, $requestField));
            $url = Storage::url($path);

        return $url;
    }

}
