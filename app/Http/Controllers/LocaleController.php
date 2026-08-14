<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LocaleController extends Controller
{
    public function setLocale(Request $request, $locale): RedirectResponse
    {
        if ($locale !== null && array_key_exists($locale, config('app.supported_locales'))) {
            App::setlocale($locale);
            Carbon::setlocale($locale);
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }
}
