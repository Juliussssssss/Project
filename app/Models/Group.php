<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function cleaning_str(string $data): string
    {
        return strip_tags(trim(preg_replace("/\s{2,}/", " ", $data)));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $query
     * @return Builder
     */
    public function scopeGetUserGroups($query): Builder
    {
        return $query->where('user_id', auth()->user()->id);
    }

    /**
     * @param $request
     * @return
     */
    public function store($request)
    {
        $data['name'] = $this->cleaning_str(($request->name));
        $data['user_id'] = auth()->user()->id;
        Group::create($data);

        return Group::getUserGroups()->get(['id', 'name']);
    }
}
