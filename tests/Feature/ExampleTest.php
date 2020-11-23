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
        Storage::fake('public');
        // get the installer file and copy temporarily to storage
        $installerFile = new File(resource_path('files/'.$this->installerFileName));
        Storage::putFileAs('public/', $installerFile, $this->installerFileName);
        Storage::assertExists('public/'.$this->installerFileName);
    }

    public function tearDown() : void
    {
        // check whether installer file exists in path and delete after test
        Storage::delete('public/'.$this->installerFileName);
        Storage::assertMissing('public/'.$this->installerFileName);
        parent::tearDown();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

}
