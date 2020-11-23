<?php

namespace App\Http\Controllers\Installer;

use App\Helpers\Installer\EHRInstaller;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
            'owner' => 'LH Admin',
            'status' => true,
            'created_at' => Carbon::now(),
            'verified_at'  => Carbon::now()
        ];
        if (!$this->installer->checkIfSiteExists("default")) {
            $this->installer->createInstallerLogFile($siteDetails);
        }
        $sites = $this->installer->readInstallerLogFile();
        return redirect()->route('index');
        // TODO continue with the installation steps if further
        return view('installer.database', compact('sites'));
    }
}
