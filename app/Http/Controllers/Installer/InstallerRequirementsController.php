<?php


namespace App\Http\Controllers\Installer;

use App\Support\Installer\RequirementsChecker;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class InstallerRequirementsController extends Controller
{

    /**
     * @var RequirementsChecker
     */
    protected RequirementsChecker $requirements;

    /**
     * @param RequirementsChecker $requirementsChecker
     */
    public function __construct(RequirementsChecker $requirementsChecker)
    {
        $this->requirements = $requirementsChecker;
    }

    /**
     * System requirement checks
     * @return Response
     */
    public function index(): Response
    {
        $phpSupportInfo = $this->requirements->checkPHPVersion(config('ehr_installer.core.minPhpVersion'));

        $requirements = $this->requirements->check(config('ehr_installer.requirements'));

        return Inertia::render('Installer/SystemRequirements', [
            'prev_url' => route('installer.index'),
            'next_url' => route('installer.file_permissions'),
            'requirements' => $requirements,
            'php_support' => $phpSupportInfo,
        ]);
    }
}
