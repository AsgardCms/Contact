<?php

namespace Modules\Contact\Repositories\Cache;

use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheContactRequestDecorator extends BaseCacheDecorator implements ContactRequestRepository
{
    public function __construct(ContactRequestRepository $contactrequest)
    {
        parent::__construct();
        $this->entityName = 'contact.contactrequests';
        $this->repository = $contactrequest;
    }
}
