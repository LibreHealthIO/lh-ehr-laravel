<?php

namespace App\Helpers\Installer;

class RequirementsChecker
{

    /**
     * Minimum PHP Version Supported. This will be determined by the ehr_installer.php
     *
     * @var $minPhpVersion
     */
    private $minPhpVersion = '7.2.5';


    /**
     * Check server requirements, extensions, apache etc.
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements)
    {
        $results = [];

        foreach ($requirements as $type => $requirement) {
            switch ($type) {
                // check php requirements
                case 'php':
                    foreach ($requirements[$type] as $newRequirement) {
                        $results['requirements'][$type][$newRequirement] = true;

                        if (!extension_loaded($newRequirement)) {
                            $results['requirements'][$type][$newRequirement] = false;
                            $results['errors'] = true;
                        }
                    }
                    break;
                // check apache requirements
                case 'apache':
                    foreach ($requirements[$type] as $newRequirement) {
                        // if function doesn't exist we can't check apache modules
                        if (function_exists('apache_get_modules')) {
                            $results['requirements'][$type][$newRequirement] = true;

                            if (! in_array($requirement, apache_get_modules())) {
                                $results['requirements'][$type][$newRequirement] = false;
                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $results;
    }


    /**
     * Check PHP version requirement.
     *
     * @param string|null $minPhpVersion
     * @return array
     */
    public function checkPHPVersion(string $minPhpVersion = null)
    {
        $minVersionPhp = $minPhpVersion;
        $currentPhpVersion = $this->getPhpVersionInfo();
        $supported = false;

        if ($minPhpVersion == null) {
            $minVersionPhp = $this->getMinPhpVersion();
        }

        if (version_compare($currentPhpVersion['version'], $minVersionPhp) >= 0) {
            $supported = true;
        }

        return [
            'full' => $currentPhpVersion['full'],
            'current' => $currentPhpVersion['version'],
            'minimum' => $minVersionPhp,
            'supported' => $supported,
        ];
    }


    /**
     * Get current PHP version information.
     *
     * @return array
     */
    private static function getPhpVersionInfo()
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];

        return [
            'full' => $currentVersionFull,
            'version' => $currentVersion,
        ];
    }

    /**
     * Get minimum PHP version used by the application.
     *
     * @return string minPhpVersion
     */
    protected function getMinPhpVersion()
    {
        return $this->minPhpVersion;
    }

}
