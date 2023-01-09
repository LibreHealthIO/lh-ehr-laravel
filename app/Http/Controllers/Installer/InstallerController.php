<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class InstallerController extends Controller
{
    /**
     * Installer introduction page
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Installer/Index', [
            'prev_url' => null,
            'next_url' => route('installer.requirements')
        ]);
    }

    /**
     * Complete the installation process and send out mails if necessary
     * @return Response
     */
    public function complete(): Response
    {
        return Inertia::render('Installer/Complete', [

        ]);
    }
}
