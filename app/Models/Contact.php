<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'number',
        'site', 'birthday', 'city', 'work', 'position', 'favorites',
        'work_email', 'comment', 'avatar', 'user_id', 'group_id'
        ];
    protected  $keys = ['avatar', 'favorites', 'first_name',
        'middle_name', 'last_name', 'email', 'number',
        'group_id','site','birthday','comment',
        'work', 'work_email','city','position'];

    public function prepareForCreate($request)
    {
        $user_id = auth()->user()->id;
        $contact = $request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $contact['avatar'] = $file->store('avatars','public');
        }
        $contact['user_id'] = $user_id;
        Contact::create($contact);

        return response('created', 200);
    }

    public function prepareForUpdate($request)
    {
        $contact = $request->only($this->keys);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $contact['avatar'] = $file->store('avatars', 'public');

            Storage::delete('/app/public/' . $request['path']);
        }
        else if($request['resetImage']){
            $contact['avatar'] = "";

            Storage::delete('/app/public/' . $request['path']);
        }

        $contact_id = $request['id'];
        Contact::where('id',$contact_id)
            ->where('user_id',auth()->user()->id)
            ->update($contact);

        return response('updated', 200);
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
