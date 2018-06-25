<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IconsController extends Controller
{
    public function icons_climacons()
    {
        return view('Admin/Icons/icons_climacons');
    }
    public function icons_font_awesome()
    {
        return view('Admin/Icons/icons_font_awesome');
    }
}