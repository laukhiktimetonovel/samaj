<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardMember;

class BoardMemberController extends Controller
{
    public function index(string $pageName)
    {
        // e.g. pageName = 'yuvak_mandal'
        // $members = BoardMember::where('page_name', $pageName)
        //                       ->orderByRaw("FIELD(type,'promukh','up_promukh','mantri','khajanchi','auditor','other')")
        //                       ->get();

        // return view('pages/board_members', compact('members','pageName'));
        return view('pages/board_members');
    }
}
