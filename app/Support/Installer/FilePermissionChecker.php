<?php


namespace App\Support\Installer;

class FilePermissionChecker
{

    /**
     * @var array<string, mixed>
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
     * @param array<string, int> $folders
     * @return array<string, mixed>
     */
    public function check(array<string, int> $folders): array<string, mixed>
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
    private function getPermission(string $folder): string
    {
        return substr(sprintf('%o', fileperms(base_path($folder))), -3);
    }
}
