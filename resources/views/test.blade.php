<?php

use App\Models\Contact;

$c = Contact::select('*')->where('user_id', auth()->user()->id)->orderBy('first_name')->with('group')->get();

dump($c);

?>

@foreach($c as $contact)
    {{ $contact->group ? $contact->group->name : '' }}
@endforeach
