<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class GeneralModel extends Model
{
    public static function resize($w, $h, $path, $quality = 70)
    {
        if ($path) {
            $file = public_path($path);
            $stopList = ['svg'];

            if (!file_exists($file)) {
                Log::error("File does not exist: {$file}");
                $file = public_path('images/no-image.png');
            } elseif (in_array(pathinfo($file, PATHINFO_EXTENSION), $stopList)) {
                return $path;
            }

            try {
                $image = Image::make($file)->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $folder = 'images/' . date('Y-m-d');
                $extension = pathinfo($file, PATHINFO_EXTENSION);

                // Генерируем уникальное имя файла
                $uniqueName = md5($file . $w . $h . time()) . '.' . $extension;
                $resizedPath = "{$folder}/{$uniqueName}";

                // Создаем директорию, если она не существует
                if (!File::exists(public_path($folder))) {
                    File::makeDirectory(public_path($folder), 0755, true);
                }

                $image->save(public_path($resizedPath), $quality);

                return $resizedPath;
            } catch (\Exception $e) {
                Log::error("Error resizing image: " . $e->getMessage());
                return 'assets/admin/img/no-image.jpeg';
            }
        }

        return 'assets/admin/img/no-image.jpeg';
    }
}
