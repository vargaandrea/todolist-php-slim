<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testPing()
    {
        $response = $this->runApp('GET', '/ping');
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('ping', (string)$response->getBody());
    }

    /**
     * Test that the index route with optional name argument returns a rendered greeting
     */
    public function testHome()
    {
        $response = $this->runApp('GET', '/home');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Welcome', (string)$response->getBody());
    }

    /**
     * Test that the index route won't accept a post request
     */
    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string)$response->getBody());
    }
}