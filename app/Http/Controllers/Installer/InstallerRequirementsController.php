<?php


namespace App\Http\Controllers\Installer;

use App\Helpers\Installer\RequirementsChecker;
use App\Http\Controllers\Controller;

class InstallerRequirementsController extends Controller
{

    /**
     * @var RequirementsChecker
     */
    protected $requirements;

    /**
     * @param RequirementsChecker $requirementsChecker
     */
    public function __construct(RequirementsChecker $requirementsChecker)
    {
        $this->requirements = $requirementsChecker;
    }

    public function index()
    {
        $phpSupportInfo = $this->requirements->checkPHPVersion(config('ehr_installer.core.minPhpVersion'));

        $requirements = $this->requirements->check(config('ehr_installer.requirements'));

        return view('installer.requirements', compact('requirements', 'phpSupportInfo'));
    }

}
