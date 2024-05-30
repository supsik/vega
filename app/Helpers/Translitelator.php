<?php

namespace App\Helpers;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Translitelator 
{
    public static function transliterate($text) {
        // Таблица транслитерации
        $transliterationTable = [
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'Yo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Ts',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];
    
        // Транслитерируем текст, используя strtr
        $transliteratedText = strtr(strtolower($text), $transliterationTable);
        return $transliteratedText;
    }

    public static function updateImageName(Model $item, string $filePath)
    {
        // Получаем имя файла и разбиваем его не части
        $fileName = $item->media[0]['file_name'];
        $fileNameParts = explode('.', $fileName);

        // Получаем путь относительно диска
        $filePath = str_replace('/var/www/storage/app/public', '', $filePath);


        // Переименовываем файл на сервере
        Storage::disk('public')
                ->move($filePath, Translitelator::transliterate($filePath));

        // Переименовываем файл в бд
        Media::where('file_name', $fileName)->update([
            'file_name' => Translitelator::transliterate($fileName),
            'name' => Translitelator::transliterate($fileNameParts[0])
        ]);
    }
}