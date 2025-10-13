<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    public function switch(Request $request)
    {
        $theme = $request->input('theme');
        
        if (in_array($theme, ['light', 'dark'])) {
            Session::put('theme', $theme);
        }
        
        return redirect()->back();
    }
}
