<?php

namespace Modules\Contact\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Contact\Entities\ContactRequest;
use Modules\Contact\Repositories\ContactRequestRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ContactRequestController extends AdminBaseController
{
    /**
     * @var ContactRequestRepository
     */
    private $contactrequest;

    public function __construct(ContactRequestRepository $contactrequest)
    {
        parent::__construct();

        $this->contactrequest = $contactrequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $requests = $this->contactrequest->all();

        return view('contact::admin.contactrequests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function show(ContactRequest $request)
    {
        return view('contact::admin.contactrequests.show', compact('request'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContactRequest $contactrequest
     * @return Response
     */
    public function destroy(ContactRequest $contactrequest)
    {
        $this->contactrequest->destroy($contactrequest);

        return redirect()->route('admin.contact.contactrequest.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('contact::contactrequests.title.contactrequests')]));
    }
}
