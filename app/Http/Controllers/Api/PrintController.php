<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ContactsRepository;

class PrintController extends Controller
{
    /**
     * @var ContactsRepository
     */
    private $contactRepository;

    /**
     * ContactsController constructor.
     * @param  ContactsRepository  $contactRepository
     */
    public function __construct(ContactsRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getGroupsContacts()
    {
        $contacts = $this->contactRepository->getGroupsForPrint();

        return response()->json($contacts);
    }
}
