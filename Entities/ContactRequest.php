<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $table = 'contact__contact_requests';
    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'message',
    ];
}
