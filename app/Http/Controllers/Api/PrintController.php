<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;

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
