<?php


namespace App\Support\Installer;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class EHRInstaller
{
    /**
     * Gets the installer file
     * @var string
     */
    private string $installerFile;

    public function __construct()
    {
        $this->installerFile = storage_path('app/public/ehr_installer.json');
    }

    /**
     * Create installation file and logs site with user
     * @param array $siteDetails
     * @return void
     * @throws FileNotFoundException
     */
    public function createInstallerLogFile(array $siteDetails): void
    {
        if (!File::exists($this->installerFile)) {
            $details = [$siteDetails];
            $contents = json_encode($details, JSON_PRETTY_PRINT, 4);
            File::put($this->installerFile, $contents);
        } else {
            $fileContents = File::get($this->installerFile);
            $tempArray = json_decode($fileContents);
            $tempArray[] = $siteDetails;
            $contents = json_encode($tempArray, JSON_PRETTY_PRINT, 4);
            File::put($this->installerFile, $contents, true);
        }
    }

    /**
     * Reads the installation file and retrieve data (sites)
     * @return array
     * @throws FileNotFoundException
     */
    public function readInstallerLogFile(): array
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
     * @param mixed|null $defaultSite
     * @return boolean
     * @throws FileNotFoundException
     */
    public function checkIfSiteExists(string $site_id, mixed $defaultSite = null): bool
    {
        $status = false;
        if (!File::exists($this->installerFile)) {
            return false;
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
