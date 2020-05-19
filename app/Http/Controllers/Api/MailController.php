<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\MailRequest;
use App\Mail\SendMessage;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MailController extends Controller
{

    /**
     * @param  MailRequest  $request
     * @return JsonResponse
     */
    public function send(MailRequest $request)
    {
        try {

            $subject = (new Contact)->cleaning_str(request('form.subject', 'Без темы'));
            $emailMessage = (new Contact)->cleaning_str(request('form.message', ''));
            $sender = auth()->user()->email;

            $contacts = Contact::getUserContacts()->whereIn('id', $request->contacts)->get();

            foreach ($contacts as $contact) {
                Mail::to($contact->email)
                    ->send(new SendMessage($emailMessage, $subject, $sender));
            }

            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }
}
