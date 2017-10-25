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
        $email = env('MAIL_TO_ADMIN') ?: setting('contact::email');

        $this->mailer->to($email)->queue(new ContactRequestNotification($event->contactRequest));
    }
}
