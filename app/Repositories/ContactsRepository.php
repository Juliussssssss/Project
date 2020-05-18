<?php

namespace App\Repositories;

use App\Models\Contact as Model;
use Illuminate\Database\Eloquent\Collection;

class ContactsRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAll() {
        $select = [
            'id', 'avatar', 'favorites', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'avatar', 'group_id'
        ];
        $result = $this
            ->startConditions()
        ->select($select)
            ->where('user_id', auth()->user()->id)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();

        return $result;
    }
}
