<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\MailRequest;
use App\Mail\SendMessage;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MailController extends Controller
{
    public function send(MailRequest $request)
    {
        try {

            $subject = request('form.subject', 'Без темы');
            $emailMessage = request('form.message', '');
            $sender = auth()->user()->email;
            //dd($sender);
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
