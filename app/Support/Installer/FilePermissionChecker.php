<?php


namespace App\Support\Installer;

class FilePermissionChecker
{

    /**
     * @var array
     */
    protected array $results = [];


    /**
     * Set the result array permissions and errors.
     *
     * @return void
     */
    public function __construct()
    {
        $this->results['permissions'] = [];
        $this->results['errors'] = null;
    }


    /**
     * Check if the folders have the right permission ehr_installer.php
     *
     * @param array $folders
     * @return array
     */
    public function check(array $folders): array
    {
        foreach ($folders as $folder => $permission) {
            $status = true;
            if (!($this->getPermission($folder) >= $permission)) {
                $status = false;
                $this->results['errors'] = true;
            }
            $this->results['permissions'][] = [
                'folder' => $folder,
                'current_permission' => $this->getPermission($folder),
                'permission' => $permission,
                'status' => $status,
            ];
        }
        return $this->results;
    }


    /**
     * Get a folder permission.
     *
     * @param $folder
     * @return string
     */
    private function getPermission($folder): string
    {
        return substr(sprintf('%o', fileperms(base_path($folder))), -3);
    }
}
