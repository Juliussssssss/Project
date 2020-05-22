<?php

namespace App\Http\Controllers\Api;

use App\Exports\ContactsFrequentExport;
use App\Exports\ContactsGroupExport;
use App\Exports\ContactsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\CallLog;
use App\Models\Contact;
use App\Models\File;
use App\Repositories\ContactsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class ContactsController extends Controller
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

    /**
     * @return JsonResponse
     */
    public function getContacts()
    {
        $contacts = $this->contactRepository->getAll();
        return response()->json($contacts);
    }

    /**
     * @return JsonResponse
     */
    public function getFrequentContacts()
    {
        $contacts = $this->contactRepository->getFrequentContacts();
        return response()->json($contacts);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function setFavorites(Request $request)
    {
        $contact = Contact::find($request->id)->update(['favorites' => $request->value]);
        (new CallLog())->prepareToCreate($request->id);

        return response()->json("ok");
    }

    /**
     * @return JsonResponse
     */
    public function getFavorites()
    {
        $contacts = $this->contactRepository->getFavorites();
        return response()->json($contacts, 200);
    }

    /**
     * @param  StoreRequest  $request
     * @return Application|ResponseFactory|Response
     */
    public function store(StoreRequest $request)
    {
        return (new Contact())->prepareForCreate($request);
    }

    /**
     * @param  int  $id
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function show(int $id)
    {
       $contact = $this->contactRepository->getContact($id);

        if(!$contact)
        {
            return response( 'error',403);
        }

        return response()->json($contact);
    }

    /**
     * @param  UpdateRequest  $request
     * @return Application|ResponseFactory|Response
     */
    public function update(UpdateRequest $request)
    {
        return (new Contact())->prepareForUpdate($request);
    }

    /**
     * @param  Request  $request
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Request $request)
    {
        $user_id = auth()->user()->id;

        foreach ($request['contacts'] as $contact_id) {
            Contact::where('user_id', $user_id)
                ->where('id', $contact_id)
                ->delete();
        }

        return response('ok', 200);
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportAll()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportFrequent()
    {
        return Excel::download(new ContactsFrequentExport, 'contacts.xlsx');
    }

    /**
     * @param  int  $id
     * @return BinaryFileResponse
     */
    public function exportGroup(int $id)
    {
        return Excel::download(new ContactsGroupExport($id), 'contacts.xlsx');
    }

    /**
     * @return JsonResponse
     */
    public function getContactsCount()
    {
        try {
            $count = $this->contactRepository->getContactsCount();
            return response()->json($count, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    /**
     * @return JsonResponse
     */
    public function getCountFrequentContacts()
    {
        try {
            $count = $this->contactRepository->getCountFrequentContacts();
            return response()->json($count, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    public function getDuplicate()
    {
        $duplicate = (new Contact())->getDuplicate();

        return response($duplicate,200);
    }

    public function mergeDuplicate(Request $request)
    {
        (new Contact())->prepareMergeContacts($request);

        return response('ok',200);
    }
}
