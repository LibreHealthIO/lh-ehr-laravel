<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InstallerController extends Controller
{
    public function index()
    {
        return view('installer.index');
    }
}
