<?php

namespace Modules\Contact\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Contact\Events\ContactRequestWasCreated;
use Modules\Contact\Events\Handlers\SendContactRequestNotification;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ContactRequestWasCreated::class => [
            SendContactRequestNotification::class,
        ],
    ];
}
