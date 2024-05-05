<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $locale = $request->input('locale');
        app()->setLocale($locale);
        $currentLocale = app()->getLocale();
        dd($currentLocale);
        return redirect()->back();
    }
    public function show()
    {
        
    }
}