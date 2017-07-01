<?php

namespace Modules\Contact\Http\Controllers\Frontend;

use Modules\Contact\Http\Requests\CreateContactRequestRequest;
use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Core\Http\Controllers\BasePublicController;

class ContactRequestController extends BasePublicController
{
    /**
     * @var ContactRequestRepository
     */
    private $contactRequest;

    public function __construct(ContactRequestRepository $contactRequest)
    {
        parent::__construct();

        $this->contactRequest = $contactRequest;
    }

    public function show()
    {
        return view('contact::public.contact');
    }

    public function store(CreateContactRequestRequest $request)
    {
        $this->contactRequest->create($request->all());

        return redirect()->back()->withSuccess('We received your request. We\'ll get back to you soon.');
    }
}
