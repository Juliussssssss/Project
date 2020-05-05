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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
