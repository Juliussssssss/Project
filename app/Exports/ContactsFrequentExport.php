<?php

namespace App\Exports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsFrequentExport implements FromCollection
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Contact::has('callLog', '>=', 3)
            ->export()
            ->get();
    }
}
