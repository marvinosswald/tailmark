<?php

namespace Marvinosswald\Tailmark\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marvinosswald\Tailmark\TailmarkServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Marvinosswald\\Tailmark\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            TailmarkServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_tailmark_table.php.stub';
        $migration->up();
        */
    }
}
