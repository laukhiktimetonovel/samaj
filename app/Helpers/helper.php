<?php
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
   if (!function_exists('get_advertisements')) {
       function get_advertisements($type = "screen")
       {
           return \App\Models\Advertisement::where('is_active', true)->where('type',$type)->get();
       }
   }

   if (!function_exists('number_to_image')) {
    function number_to_image($number, $path = 'storage/numbers/', $filename = 'number.png') {
        $number = (string)$number;
        $filename = $number . '.png';
        $fullPath = $path . $filename;
        if(file_exists($fullPath)){
            return asset($fullPath);
        }
        // Create directory if it doesn't exist
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }
        if (!extension_loaded('gd')) {
            die('GD extension is not enabled.');
        }

        $part1 = substr($number, 0, 5); // First 5 digits
        $part2 = substr($number, 5, 5); // Last 5 digits
        $displayNumber = $part1 .'-'. $part2;
        // Initialize ImageManager with GD driver
        $manager = ImageManager::gd();

        $fontPath = public_path('fonts/Bronto-RegularItalic.ttf');
        $imagePath = public_path('storage/mobile-number-bg-new.png');
        $image = $manager->read($imagePath);
        $width = $image->width();
        $image->text($displayNumber, $width / 2 , 40, function ($font) use ($fontPath) {
                $font->file($fontPath);
                $font->size(36);
                $font->color('#000');
                $font->align('center');
                $font->valign('center');
                $font->angle(-5);
            });

        // Save the image
        $image->save($fullPath);

        return asset($path . $filename);
    }
}