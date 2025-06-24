<?php
use Intervention\Image\ImageManager;
   if (!function_exists('get_advertisements')) {
       function get_advertisements($type = "screen")
       {
           return \App\Models\Advertisement::where('is_active', true)->where('type',$type)->get();
       }
   }

   if (!function_exists('number_to_image')) {
    function number_to_image($number, $path = 'images/numbers/', $filename = 'number.png') {
        $number = (string)$number;
        $fullPath = public_path($path . $filename);

        // Create directory if it doesn't exist
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }
        $manager = new ImageManager(new Intervention\Image\Drivers\Gd\Driver());
        // Use Intervention Image to generate the image
        $manager->canvas(200, 100, '#ffffff')
            ->text($number, 100, 50, function($font) {
                $font->file(public_path('fonts/arial.ttf'));
                $font->size(40);
                $font->color('#000000');
                $font->align('center');
                $font->valign('middle');
            })
            ->save($fullPath);

        return asset($path . $filename);
    }
}