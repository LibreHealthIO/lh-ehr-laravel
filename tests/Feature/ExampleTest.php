<?php

namespace Tests\Feature;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * The installer file name.
     *
     * @var string
     */
    private $installerFileName = 'ehr_installer.json';

    public function setUp() : void
    {
        parent::setUp();
        // get the installer file and copy temporarily to storage
        $installerFile = new File(resource_path('files/'.$this->installerFileName));
        Storage::putFileAs('/', $installerFile, $this->installerFileName);
    }

    protected function tearDown() : void
    {
        parent::tearDown();
        // check whether installer file exists in path and delete after test
        // Storage::delete('/'.$this->installerFileName);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Storage::assertExists($this->installerFileName);
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
