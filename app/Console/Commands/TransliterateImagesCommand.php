<?php

namespace App\Console\Commands;

use App\Helpers\Translitelator;
use App\Models\Media;
use Illuminate\Console\Command;
use Storage;

class TransliterateImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transliterate:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete transliteration image files in public directory and database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $images = Storage::disk('public')->allFiles(); 

        $imagesCount = count($images);

        for($i = 0; $i < $imagesCount; $i++)
        {
            $oldPath = $images[$i];
            $newPath = Translitelator::transliterate($oldPath);
            
            // Переименование файлов
            Storage::disk('public')->move($oldPath,$newPath); 

            $fileName = explode('/', $oldPath);

            $oldFileName = end($fileName);
            $newFileName = Translitelator::transliterate($oldFileName);

            $newNameWithoutExt = explode('.', $newFileName);

            // Обновление модели медиа

            $media = Media::where('file_name', $oldFileName)->update([
                'file_name' => $newFileName,
                'name' => $newNameWithoutExt[0]
            ]);
        }
    }    
}
