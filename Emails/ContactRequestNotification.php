<?php

namespace Modules\Contact\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Contact\Entities\ContactRequest;

class ContactRequestNotification extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var ContactRequest
     */
    public $contactRequest;

    public function __construct(ContactRequest $contactRequest)
    {
        $this->contactRequest = $contactRequest;
    }

    public function build()
    {
        return $this->subject(trans('contact::contactrequests.email.subject'))
            ->view('contact::emails.contact-request-notification')
            ->replyTo($this->contactRequest->email);
    }
}
