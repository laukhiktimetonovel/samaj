<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Advertisement;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisement::create([
        //     'title' => 'Ad 1',
        //     'image_path' => 'images/160 × 600.png',
        //     'url' => '#',
        //     'is_active' => true,
        // ]);

        // Advertisement::create([
        //     'title' => 'Ad 2',
        //     'image_path' => 'images/160 × 600 (1).png',
        //     'url' => '#',
        //     'is_active' => true,
        // ]);

        // Advertisement::create([
        //     'title' => 'Ad 3',
        //     'image_path' => 'images/160 × 600.png',
        //     'url' => '#',
        //     'is_active' => true,
        // ]);

        Advertisement::create([
            'title' => 'Ad 1',
            'image_path' => 'images/mobileadd1.png',
            'url' => '#',
            'is_active' => true,
            'type' => 'mobile'
        ]);

        Advertisement::create([
            'title' => 'Ad 2',
            'image_path' => 'images/mobileadd2.png',
            'url' => '#',
            'is_active' => true,
            'type' => 'mobile'
        ]);

        Advertisement::create([
            'title' => 'Ad 3',
            'image_path' => 'images/mobileadd1.png',
            'url' => '#',
            'is_active' => true,
            'type' => 'mobile'
        ]);
    }
}
