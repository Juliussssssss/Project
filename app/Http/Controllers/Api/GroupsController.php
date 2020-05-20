<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateContactGroupRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Contact;
use App\Models\Group;
use App\Repositories\ContactsRepository;
use App\Repositories\GroupsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class GroupsController extends Controller
{
    /**
     * @var GroupsRepository
     */
    private $groupsRepository;

    /**
     * @var ContactsRepository
     */
    private $contactsRepository;

    /**
     * GroupsController constructor.
     * @param  GroupsRepository  $groupsRepository
     * @param  ContactsRepository  $contactsRepository
     */
    public function __construct(GroupsRepository $groupsRepository, ContactsRepository $contactsRepository)
    {
        $this->groupsRepository = $groupsRepository;
        $this->contactsRepository = $contactsRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $groups = $this->groupsRepository->getGroups();
        return response()->json($groups, 200);
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        try {
            $contacts = $this->contactsRepository->getContactsFromGroup($id);
            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    /**
     * @param  StoreRequest  $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            (new Group)->store($request);

            $groups = $this->groupsRepository->getGroups();
            return response()->json($groups, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    /**
     * @param  UpdateRequest  $request
     * @param  Group  $group
     */
    public function update(UpdateRequest $request, Group $group)
    {
        //
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $group = Group::getUserGroups()->find($id);
            $group->delete();

            $groups = $this->groupsRepository->getGroups();
            return response()->json($groups, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    /**
     * @param  int  $id
     * @param  UpdateContactGroupRequest  $request
     * @return JsonResponse
     */
    public function deleteGroupInContacts(int $id, UpdateContactGroupRequest $request)
    {
        try {
            Contact::getUserContacts()
                ->where('group_id', $id)
                ->whereIn('id', $request->contacts)
                ->update(['group_id' => null]);

            $contacts = $this->contactsRepository->getAll();
            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    /**
     * @param  int  $id
     * @param  UpdateContactGroupRequest  $request
     * @return JsonResponse
     */
    public function addGroupInContacts(int $id, UpdateContactGroupRequest $request)
    {
        try {
            Contact::getUserContacts()
                ->whereIn('id', $request->contacts)
                ->update(['group_id' => $id]);

            $contacts = $this->contactsRepository->getAll();
            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }
}
