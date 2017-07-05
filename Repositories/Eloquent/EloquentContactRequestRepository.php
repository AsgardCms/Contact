<?php

namespace Modules\Contact\Repositories\Eloquent;

use Modules\Contact\Events\ContactRequestWasCreated;
use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentContactRequestRepository extends EloquentBaseRepository implements ContactRequestRepository
{
    public function create($data)
    {
        $contactRequest = $this->model->create($data);

        event(new ContactRequestWasCreated($contactRequest));

        return $contactRequest;
    }

}
