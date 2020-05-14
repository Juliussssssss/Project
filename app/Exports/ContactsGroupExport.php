<?php

namespace App\Exports;

use App\Models\Contact;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ContactsGroupExport implements FromView
{
    private $group_id;

    /**
     * ContactsGroupExport constructor.
     * @param  int  $id
     */
    function __construct(int $id)
    {
        $this->group_id = $id;
    }

    public function view(): View
    {
        return view('exports.contacts', [
            'contacts' => Contact::export()
                ->where('group_id', $this->group_id)
                ->get()
        ]);
    }
}
