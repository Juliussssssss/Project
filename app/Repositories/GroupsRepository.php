<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\Interfaces\GroupsRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class GroupsRepository.
 */
class GroupsRepository extends BaseRepository implements GroupsRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Group::class;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return Group::select('id', 'name')
            ->where('user_id', auth()->user()->id)
            ->withCount('contacts')
            ->get();
    }
}

