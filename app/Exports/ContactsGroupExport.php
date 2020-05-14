<?php

namespace App\Exports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsGroupExport implements FromCollection
{
    private $group_id;

    /**
     * ContactsGroupExport constructor.
     * @param  int  $id
     */
    function __construct(int $id) {
        $this->group_id = $id;
    }

    /**
    * @return Collection
    */
    public function collection()
    {
        $select = [
            'first_name', 'middle_name', 'last_name', 'email', 'number', 'site', 'birthday', 'city', 'work', 'position',
            'work_email', 'comment',
        ];

        return Contact::export()
            ->where('group_id', $this->group_id)
            ->get();
    }
}
