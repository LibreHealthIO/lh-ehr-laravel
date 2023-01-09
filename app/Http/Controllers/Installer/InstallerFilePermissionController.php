<?php


namespace App\Http\Controllers\Installer;

use App\Support\Installer\FilePermissionChecker;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class InstallerFilePermissionController extends Controller
{

    /**
     * @var FilePermissionChecker
     */
    protected FilePermissionChecker $permissions;


    /**
     * @param FilePermissionChecker $filePermissionChecker
     */
    public function __construct(FilePermissionChecker $filePermissionChecker)
    {
        $this->permissions = $filePermissionChecker;
    }


    /**
     * Files/Folders requirement checks
     * @return Response
     */
    public function index(): Response
    {
        $permissions = $this->permissions->check(config('ehr_installer.permissions'));
        return Inertia::render('Installer/FilesPermission', [
            'prev_url' => route('installer.requirements'),
            'next_url' => route('installer.database'),
            'file_permissions' => $permissions
        ]);
    }
}
