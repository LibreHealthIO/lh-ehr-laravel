<?php

use App\Models\Patients\Patient;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

if (!function_exists('app_name')) {
    /**
     * Gets application name.
     *
     * @return string
     */
    function app_name(): string
    {
        return config('app.name', 'LibreHealth EHR');
    }
}

if (!function_exists('app_version')) {
    /**
     * Gets application's current version.
     *
     * @return string
     */
    function app_version(): string
    {
        return config('app.version', '3.0.0');
    }
}


if (!function_exists('copyrights_text')) {
    /**
     * Gets application's copyrights text
     *
     * @return string
     */
    function copyrights_text(): string
    {
        return "Copyright &copy; ". date('Y') ." &mdash; ".
            app_name() . ". ".__('general.all_rights_reserved');
    }
}

if (!function_exists('page_direction')) {
    /**
     * Gets application page direction either rtl or ltr
     * Default is ltr.
     *
     * @return string
     */
    function page_direction(): string
    {
        $rtl_locales = config('app.rtl_locales', ['ae']);
        return in_array(app()->getLocale(), $rtl_locales) ? "rtl" : "ltr";
    }
}


if (!function_exists('redirectWithoutInertia')) {
    /**
     * Redirects without inertia
     * @param string $url
     * @return string
     */
    function redirectWithoutInertia(string $url): string
    {
        return response('', SymfonyResponse::HTTP_CONFLICT)->header('x-inertia-location', $url);
    }
}

if (!function_exists('generatePID')) {
    /**
     * @return string
     */
    function generatePID(): string
    {
        $lab_id = rand(1000, 9000000);
        if (Patient::where('pid',  $lab_id)->exists()) {
            return generatePID();
        }
        return $lab_id;
    }
}
