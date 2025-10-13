<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request)
    {
        $language = $request->input('language');
        
        if (in_array($language, ['en', 'ar', 'es', 'nl'])) {
            App::setLocale($language);
            Session::put('locale', $language);
            Session::save(); // Ensure session is saved
            
            // Also set the locale in the current request
            $request->setLocale($language);
            
            // Log for debugging
            \Log::info('Language switched to: ' . $language, [
                'session_id' => Session::getId(),
                'session_locale' => Session::get('locale'),
                'app_locale' => App::getLocale()
            ]);
        }
        
        return redirect()->back();
    }
}
