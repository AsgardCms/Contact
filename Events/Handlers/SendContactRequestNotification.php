<?php

namespace Modules\Contact\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
use Modules\Contact\Emails\ContactRequestNotification;
use Modules\Contact\Events\ContactRequestWasCreated;

class SendContactRequestNotification
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(ContactRequestWasCreated $event)
    {
        $this->mailer->to('some@email.com')->send(new ContactRequestNotification($event->contactRequest));
    }
}
