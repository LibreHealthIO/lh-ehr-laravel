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
    public function handle(Request $request, Closure $next): mixed
    {
        // checks if a patient is selected and actually exists

        if (!Cookie::get('ehr_patient')) {
            return redirect()->back()->with('error', __('general.please_select_a_patient'));
        } else {
            $pid = $request->route()->parameter('pid');
            $patientId = decrypt(Cookie::get('ehr_patient'));

            // validate incoming request with patient session
            $patient = Patient::where('pid', $pid)->first();
            if (!$patient || ($patientId != $pid)) {
                return redirect()->back()->with('error', __('general.please_select_a_correct_patient'));
            }
        }
        return $next($request);
    }
}
