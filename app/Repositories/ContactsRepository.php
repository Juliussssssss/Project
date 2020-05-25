<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactsRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class ContactsRepository.
 */
class ContactsRepository extends BaseRepository implements ContactsRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Contact::class;
    }

    /**
     * @var string[]
     */
    public $select = [
        'id', 'avatar', 'favorites', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'avatar', 'group_id'
    ];

    /**
     * @return mixed
     */
    public function getAll()
    {
        return Contact::select($this->select)
            ->where('user_id', auth()->user()->id)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function getContactsFromGroup(int $id)
    {
        return Contact::select($this->select)
            ->where('user_id', auth()->user()->id)
            ->where('group_id', $id)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();
    }

    /**
     * @return mixed
     */
    public function getFrequentContacts()
    {
        return Contact::has('callLog', '>=', 3)
            ->select($this->select)
            ->where('user_id', auth()->user()->id)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();
    }

    /**
     * @return mixed
     */
    public function getFavorites()
    {
        return Contact::select($this->select)
            ->where('user_id', auth()->user()->id)
            ->where('favorites', 1)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function getContact(int $id)
    {
        $select = [
            'id', 'avatar', 'favorites', 'first_name',
            'middle_name', 'last_name', 'email', 'number',
            'avatar', 'group_id','site','birthday','comment',
            'work', 'work_email','city','position'
        ];

        return Contact::where('id', $id)
            ->where('user_id',auth()->user()->id)
            ->first($select);
    }

    /**
     * @return mixed
     */
    public function getContactsCount()
    {
        return Contact::where('user_id', auth()->user()->id)->count();
    }

    /**
     * @return mixed
     */
    public function getCountFrequentContacts()
    {
        return Contact::has('callLog', '>=', 3)
            ->where('user_id', auth()->user()->id)
            ->count();
    }

    public function getGroupsForPrint()
    {
        $contactsFromGroups = Contact::groupBy('group_id')
            ->whereNotNull('group_id')
            ->where('user_id', auth()->user()->id)
            ->selectRaw('group_id, count(*) as total')
            ->with('group:id,name')
            ->get();

        return $contactsFromGroups;
    }
}
