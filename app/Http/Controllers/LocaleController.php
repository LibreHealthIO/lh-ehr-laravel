<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use JetBrains\PhpStorm\NoReturn;

class LocaleController extends Controller
{
    #[NoReturn] public function setLocale(Request $request, $locale): RedirectResponse
    {
        if ((isset($locale) && $locale != null) ||
            ((isset($locale) && $locale != null) && $request->header('X-Inertia'))) {
            // if it's a valid language, set as locale.
            if (array_key_exists($locale, config()->get('app.supported_locales'))) {
                App::setlocale($locale);
                Carbon::setlocale($locale);
                session()->put('locale', $locale);
            }
        }
        return redirect()->back();
    }
}
