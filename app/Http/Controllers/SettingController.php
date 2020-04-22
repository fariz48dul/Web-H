<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getAbout()
    {
        return view('homepage');
    }

    public function getSlider()
    {
        return view('homepage');
    }
}
