<?php

namespace Database\Seeders;

use App\Models\BoardMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=>' પટેલ અમૃતલાલ જોઈતારામ',
                'role'=>'(પ્રમુખશ્રી)',
                'phone'=>'૯૮૨૫૧૨૧૮૦૮',
                'image'=>'img1.jpg',
                'page_name'=>'board_members',
                'type'=>0,
            ],
            [
                'name'=>'પટેલ ગોપાળભાઈ ભગવાનભાઈ કિયાદરા',
                'role'=>'(ઉપ પ્રમુખશ્રી)',
                'phone'=>'૯૮૨૫૦૬૩૬૦૦',
                'image'=>'img1.jpg',
                'page_name'=>'board_members',
                'type'=>0,
            ],
            // ... repeat for all 11 ...
        ];
        foreach($data as $d) BoardMember::create($d);
    }
}
