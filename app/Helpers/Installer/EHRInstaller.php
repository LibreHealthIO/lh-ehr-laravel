<?php


namespace App\Helpers\Installer;

use Illuminate\Support\Facades\File;

class EHRInstaller
{
    /**
     * Gets the installer file
     * @var string
     */
    private $installerFile;

    public function __construct()
    {
        $this->installerFile = storage_path('app/public/ehr_installer.json');
    }

    /**
     * Create installation file and logs site with user
     * @param array $siteDetails
     * @return void
     */
    public function createInstallerLogFile(array $siteDetails)
    {
        if (!File::exists($this->installerFile)) {
            $details = [$siteDetails];
            $contents = json_encode($details, JSON_PRETTY_PRINT, 4);
            File::put($this->installerFile, $contents);
        } else {
            $fileContents = File::get($this->installerFile);
            $tempArray = json_decode($fileContents);
            array_push($tempArray, $siteDetails);
            $contents = json_encode($tempArray, JSON_PRETTY_PRINT, 4);
            File::put($this->installerFile, $contents, true);
        }
    }

    /**
     * Reads the installation file and retrieve data (sites)
     * @return array
     */
    public function readInstallerLogFile()
    {
        $status = true;
        $results = [];
        if (!File::exists($this->installerFile)) {
            $status = false;
        } else {
            $sites = File::get($this->installerFile);
            $contents = json_decode($sites, true);
            $results['sites'] = $contents;
        }
        $results['status'] = $status;
        return $results;
    }

    /**
     * Check if site exists by object(EHRSite) or site_id
     * @param string $site_id
     * @param mixed $defaultSite
     * @return boolean
     */
    public function checkIfSiteExists($site_id, $defaultSite = null)
    {
        $status = false;
        if (!File::exists($this->installerFile)) {
            return  $status;
        } else {
            $contents = File::get($this->installerFile);
            $sites = json_decode($contents, true);
            if ($defaultSite) {
                if (in_array($defaultSite, $sites)) {
                    $status = true;
                }
            } else {
                foreach ($sites as $site) {
                    if ($site['site_id'] === $site_id) {
                        $status = true;
                    }
                }
            }
        }
        return $status;
    }
}
