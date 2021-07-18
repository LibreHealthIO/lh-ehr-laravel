<?php


namespace App\Http\Controllers\Installer;

use App\Helpers\Installer\FilePermissionChecker;
use App\Http\Controllers\Controller;

class InstallerFilePermissionController extends Controller
{

    /**
     * @var FilePermissionChecker
     */
    protected $permissions;


    /**
     * @param FilePermissionChecker $filePermissionChecker
     */
    public function __construct(FilePermissionChecker $filePermissionChecker)
    {
        $this->permissions = $filePermissionChecker;
    }


    public function index()
    {
        $permissions = $this->permissions->check(config('ehr_installer.permissions'));
        return view('installer.files_permission', compact('permissions'));
    }
}
