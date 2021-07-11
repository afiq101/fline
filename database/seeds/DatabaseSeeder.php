<?php

use App\Image;
use App\Media;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $path = 'public/assets/images/media';
        $dir = new FilesystemIterator($path);

        foreach ($dir as $value) {

            $fullDir = $path . '/' . $value->getFilename();
            list($width, $height, $type, $attr) = getimagesize($fullDir);
            $size = filesize($fullDir);

            // $this->command->info($width);
            // $this->command->info($height);
            // $this->command->info($size);

            // // $this->command->info($type);
            // // $this->command->info($attr);

            $media = Media::create([
                'path' => $value->getFilename(),
                'title' => $value->getFilename(),
                'size' => $size
            ]);

            if (isset($width) && isset($height)) {
                Image::create([
                    'width' => $width,
                    'height' => $height,
                    'mediaid' => $media->id
                ]);
            }
        }
    }
}
