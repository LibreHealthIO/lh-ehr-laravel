<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function setLocale(Request $request, $locale)
    {
        if ((isset($locale) && $locale != null) ||
            ((isset($locale) && $locale != null) && $request->header('X-Inertia'))) {
            // if it's a valid language, set as locale.
            if (array_key_exists($locale, config()->get('app.supported_locales'))) {
                App::setlocale($locale);
                session()->put('locale', $locale);
            }
        }
        return redirect()->back();
    }
}
