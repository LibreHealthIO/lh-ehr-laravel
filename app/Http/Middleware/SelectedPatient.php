<?php

namespace App\Http\Middleware;

use App\Models\Patients\Patient;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SelectedPatient
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // checks if a patient is selected and actually exists

        if (!Cookie::get('ehr_patient')) {
            return redirect()->back()->with('error', __('general.no_such_patient'));
        } else {
            $id = $request->route()->parameter('id');
            $patientId = decrypt(Cookie::get('ehr_patient'));

            // validate incoming request with patient session
            $patient = Patient::find($id);
            if (!$patient || ($patientId != $id)) {
                return redirect()->back()->with('error', __('general.no_such_patient'));
            }
        }
        return $next($request);
    }
}
