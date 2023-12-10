<?php
/**
 * Правки:
 * 1. Добавлена проверка наличия файла перед его обработкой, чтобы избежать ошибок, если файл не загружен.
 * 2. В случае, если файл не был загружен, возвращается текущий URL аватара пользователя.
 * 3. Использован более явный и краткий синтаксис для проверки наличия файла ($request->hasFile('avatar')).
 */
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

    public function storeImage(Request $request, $user, string $requestField): string
    {        
       
        if ($request->hasFile('avatar')) {           
            
            $oldPath = str_replace('storage', 'public', $user['avatar']);
            Storage::delete($oldPath);            

            $path = Storage::putFileAs('public/images/user_profile', $request->file('avatar'),
                $this->getUploadedFileName($request, $requestField));
            $url = Storage::url($path);

            return $url;
        }

        return $user->avatar; // If no new image uploaded, return the existing avatar URL
    }

}
