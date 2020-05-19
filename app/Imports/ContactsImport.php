<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Group;
use DateTime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ContactsImport implements ToModel,WithHeadingRow,SkipsOnError, WithBatchInserts
{
    use Importable, SkipsErrors;

    function clear($str){

        return strip_tags(trim($str));
    }

    public function batchSize(): int
    {
        return 1;
    }

    public function model(array $row)
    {
        $user_id = auth()->user()->id;
        if (!filter_var($this->clear($row['email']??null), FILTER_VALIDATE_EMAIL)) {

            return;
        }
        $unique_email=(new Contact())
            ->storeUniqueEmailForUser($this->clear($row['email']??null),$user_id);
        $first_name = $this->clear($row['imya']??null);
        $middle_name = $this->clear($row['familiya']??null);
        $group_id=null;
        if(!$unique_email||!$first_name||!$middle_name){

            return;
        }
        $groupName = $this->clear( $row['gruppa']??null);
        if($groupName) {
            $group_id = (new Group())->getGroupIdByName($groupName);

            if (!$group_id) {
                $group_id = (new Group())->createAndGetGroupId($groupName);
            }
        }
//        dd($row['data_rozdeniya']);
//        $date = DateTime::createFromFormat('dd/mm/yy', $row['data_rozdeniya']);
//        dd($date);
//        if (!$date)
//        {
//            $row['data_rozdeniya']=null;
//        }

        return new Contact([
            'first_name' => $this->clear($row['imya']),
            'middle_name' => $this->clear($row['familiya']),
            'last_name' => $this->clear($row['otcestvo']??null),
            'email' => $this->clear($row['email']),
            'number' => $this->clear($row['telefon']??null),
            'site' => $this->clear($row['sait']??null),
            'birthday' => $row['data_rozdeniya']??null,
            'city' => $this->clear($row['gorod']??null),
            'work' => $this->clear($row['mesto_raboty']??null),
            'position' =>$this->clear( $row['dolznost']??null),
            'work_email' =>$this->clear( $row['email_rabocii']??null),
            'group_id' => $group_id,
            'comment' => $this->clear($row['kommentarii']??null),
            'favorites'=>"0",
            'user_id'=>$user_id
        ]);
    }
}
