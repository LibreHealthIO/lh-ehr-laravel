<?php

namespace App\Http\Controllers\Installer;

use App\Support\Installer\EHRInstaller;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Inertia\Inertia;
use Inertia\Response;

class InstallerDatabaseController extends Controller
{
    /**
     * @var EHRInstaller
     */
    protected EHRInstaller $installer;

    /**
     * @param EHRInstaller $EHRInstaller
     */
    public function __construct(EHRInstaller $EHRInstaller)
    {
        $this->installer = $EHRInstaller;
    }

    /**
     * Returns database configurations/setup and seeder if possible
     * @return Response
     * @throws FileNotFoundException
     */
    public function index(): Response
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
        return Inertia::render('Installer/Database', [
            'prev_url' => route('installer.file_permissions'),
            'next_url' => route('installer.complete'),
            'sites' => $sites
        ]);
    }
}
