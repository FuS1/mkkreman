<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCaseTrait;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use TestCaseTrait;

    protected function setUp(): void
    {
        if (! defined('LARAVEL_START')) {
            define('LARAVEL_START', microtime(true));
        }

        parent::setUp();

        Artisan::call('migrate:fresh');

        Artisan::call('migrate');
    }
}
