<?php

namespace App\Http\Controllers\Installer;

use App\Helpers\Installer\EHRInstaller;
use App\Helpers\Installer\RequirementsChecker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    /**
     * @var EHRInstaller
     */
    protected $installer;

    /**
     * @param EHRInstaller $EHRInstaller
     */
    public function __construct(EHRInstaller $EHRInstaller)
    {
        $this->installer = $EHRInstaller;
    }

    public function index()
    {
        // create a default site
        $siteDetails = [
            'site_id' => 'default',
            'owner' => 'Tendong fack',
            'status' => false,
            'created_at' => '2020-03-09 12:32 PM',
            'verified_at'  => '2020-03-09 14:22 PM'
        ];
        if (!$this->installer->checkIfSiteExists("default")) {
            $this->installer->createInstallerLogFile($siteDetails);
        }
        $sites = $this->installer->readInstallerLogFile();
        dd($sites);
        return view('installer.database', compact('sites'));
    }
}
