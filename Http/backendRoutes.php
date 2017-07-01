<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/contact'], function (Router $router) {
    $router->bind('contactRequest', function ($id) {
        return app('Modules\Contact\Repositories\ContactRequestRepository')->find($id);
    });
    $router->get('contactrequests', [
        'as' => 'admin.contact.contactrequest.index',
        'uses' => 'ContactRequestController@index',
        'middleware' => 'can:contact.contactrequests.index'
    ]);
    $router->get('contactrequests/{contactRequest}/show', [
        'as' => 'admin.contact.contactrequest.show',
        'uses' => 'ContactRequestController@show',
        'middleware' => 'can:contact.contactrequests.show'
    ]);
    $router->delete('contactrequests/{contactRequest}', [
        'as' => 'admin.contact.contactrequest.destroy',
        'uses' => 'ContactRequestController@destroy',
        'middleware' => 'can:contact.contactrequests.destroy'
    ]);
// append

});
