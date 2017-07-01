<?php

namespace Modules\Contact\Providers;

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
    }

    public function boot()
    {
        $this->publishConfig('contact', 'permissions');
        $this->publishConfig('contact', 'settings');
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
}
