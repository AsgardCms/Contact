<?php

namespace Modules\Contact\Events;

use Modules\Contact\Entities\ContactRequest;

class ContactRequestWasCreated
{
    /**
     * @var ContactRequest
     */
    public $contactRequest;

    public function __construct(ContactRequest $contactRequest)
    {
        $this->contactRequest = $contactRequest;
    }
}
