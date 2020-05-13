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

    public function getGroupIdByName($name)
    {
        $group = Group::where('name',$name)
            ->where('user_id',auth()->user()->id)
            ->first('id');

        return $group->id??null;
    }
    public function createAndGetGroupId($name)
    {
        $group['name'] = $name;
        $group['user_id'] = auth()->user()->id;
        $group = Group::create($group);

        return $group->id??null;
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
