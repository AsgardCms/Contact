<?php

namespace Modules\Contact\Tests;

use Maatwebsite\Sidebar\SidebarServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider;
use Modules\Contact\Providers\ContactServiceProvider;
use Modules\Contact\Providers\EventServiceProvider;
use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Core\Providers\CoreServiceProvider;
use Nwidart\Modules\LaravelModulesServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class BaseContactRequestTest extends TestCase
{
    /**
     * @var ContactRequestRepository
     */
    protected $contactRequest;

    public function setUp()
    {
        parent::setUp();

        $this->resetDatabase();

        $this->contactRequest = app(ContactRequestRepository::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            \Collective\Html\HtmlServiceProvider::class,
            LaravelModulesServiceProvider::class,
            CoreServiceProvider::class,
            ContactServiceProvider::class,
            EventServiceProvider::class,
            LaravelLocalizationServiceProvider::class,
            SidebarServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelLocalization' => LaravelLocalization::class,
            'Form' => \Collective\Html\FormFacade::class,
            'Html' => \Collective\Html\HtmlFacade::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/..';
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ));
        $app['config']->set('translatable.locales', ['en', 'fr']);
        $app['config']->set('modules.namespace', 'Modules');
        $app['config']->set('modules.paths.modules', __DIR__ . '/../../../Modules');
        $app['config']->set('stylist.themes.paths', [__DIR__ . '/../../../Themes']);
        $app['config']->set('asgard.core.core.admin-theme', 'AdminLTE');
        $app['config']->set('mail.from.address', 'superadmin@gmail.com');
    }

    private function resetDatabase()
    {
        $this->artisan('migrate', [
            '--database' => 'sqlite',
        ]);
        // We empty all tables
        $this->artisan('migrate:reset', [
            '--database' => 'sqlite',
        ]);
        // Migrate
        $this->artisan('migrate', [
            '--database' => 'sqlite',
        ]);
    }
}
