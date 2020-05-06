<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'number',
        'site', 'birthday', 'city', 'work', 'position', 'favorites',
        'work_email', 'comment', 'avatar', 'user_id', 'group_id'
        ];

    public function prepareForCreate($request)
    {
        $user_id = auth()->user()->id;
        $contact = $request->all();
        $path = (new File())->saveAvatar($request);
        $contact['avatar'] = $path;
        $contact['user_id'] = $user_id;
        Contact::create($contact);

        return response('created', 200);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
