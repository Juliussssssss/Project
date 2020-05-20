<?php

namespace App\Repositories\Interfaces;

use App\Models\Group;

interface ContactsRepositoryInterface
{
    public function getAll();

    public function getContactsFromGroup(int $id);

    public function getFrequentContacts();

    public function getFavorites();

    public function getContact(int $id);

    public function getContactsCount();

    public function getCountFrequentContacts();
}
