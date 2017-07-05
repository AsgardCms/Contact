<?php

namespace Modules\Contact\Providers;

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Contact\Entities\ContactRequest;
use Modules\Contact\Repositories\Cache\CacheContactRequestDecorator;
use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Contact\Repositories\Eloquent\EloquentContactRequestRepository;
use Modules\Core\Traits\CanPublishConfiguration;

class ContactServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->registerFactories();
    }

    public function boot()
    {
        $this->publishConfig('contact', 'permissions');
        $this->publishConfig('contact', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if (app()->environment() === 'testing') {
            $this->app['view']->addNamespace('contact', __DIR__ . '/../Resources/views');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(ContactRequestRepository::class, function () {
            $repository = new EloquentContactRequestRepository(new ContactRequest());

            if (! config('app.cache')) {
                return $repository;
            }

            return new CacheContactRequestDecorator($repository);
        });
// add bindings

    }

    /**
     * Register an additional directory of factories.
     * @source https://github.com/sebastiaanluca/laravel-resource-flow/blob/develop/src/Modules/ModuleServiceProvider.php#L66
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }
}
