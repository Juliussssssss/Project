<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    public function cleaning_str(string $data): string
    {
        return strip_tags(trim(preg_replace("/\s{2,}/", " ", $data)));
    }

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'number', 'site', 'birthday', 'city', 'work', 'position',
        'favorites', 'work_email', 'comment', 'avatar', 'user_id', 'group_id'
    ];

    protected $keys = [
        'id', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'site', 'birthday', 'city', 'work',
        'position', 'favorites', 'work_email', 'comment', 'avatar', 'user_id', 'group_id'
    ];

    protected $exportFillable = [
        'first_name','middle_name', 'last_name', 'email', 'number', 'site', 'birthday', 'city', 'work', 'position',
        'work_email', 'comment', 'user_id', 'group_id'
    ];

    public function scopeExport($query): Builder
    {
        return $query->select($this->exportFillable)->where('user_id', auth()->user()->id)->orderBy('first_name')->with('group');
    }

    public function scopeGetUserContacts($query): Builder
    {
        return $query->select($this->keys)->where('user_id', auth()->user()->id);
    }

    public function prepareForCreate($request)
    {
        $user_id = auth()->user()->id;
        $contact = $request->all();
        if (!$this->storeUniqueEmailForUser($contact['email'], $user_id)) {

            return response('duplicated', 500);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $contact['avatar'] = $file->store('avatars', 'public');
        }
        $contact['user_id'] = $user_id;
        Contact::create($contact);

        return response('created', 200);
    }

    public function prepareForUpdate($request)
    {
        $contact = $request->only($this->keys);
        $user_id = auth()->user()->id;
        if (!$this->updateUniqueEmailForUser($contact['email'], $user_id, $request['id'])) {

            return response('duplicated', 500);
        }
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $contact['avatar'] = $file->store('avatars', 'public');

            Storage::delete('/app/public/'.$request['path']);
        } else {
            if ($request['resetImage']) {
                $contact['avatar'] = "";

                Storage::delete('/app/public/'.$request['path']);
            }
        }
        $contact_id = $request['id'];
        Contact::where('id', $contact_id)->where('user_id', $user_id)->update($contact);
        (new CallLog())->prepareToCreate($request['id']);

        return response('updated', 200);
    }

    public function getDuplicate($skip)
    {

        $contacts = DB::table('contacts')->get();
        foreach ($contacts as $key=>$contact){

            $contacts[$key]->fio=$contacts[$key]
                    ->first_name.' '.$contacts[$key]->middle_name.' '.$contacts[$key]
                    ->last_name;
        }
        $fioGroups = collect($contacts)->groupBy('fio');
        $numberGroups = collect($contacts)->groupBy('number');
        $result=collect();

        foreach ($fioGroups as $key=>$fioGroup)
        {
            if(count($fioGroup)>1&&$key)
            {
                $result = $result->merge(collect($fioGroup));
            }
        }
        foreach ($numberGroups as $key=>$numberGroup)
        {
            if(count($numberGroup)>1&&$key)
            {
                $result = $result->merge(collect($numberGroup));
            }
        }
        if(!count($result)){

            return [];
        }
        $indexFirst=0;
        $indexSecond=1;
        if($skip){
            $indexFirst=$skip+1;
            $indexSecond=$skip+2;
        }
        $response = [
            'count'=>ceil(count($result)/2-$skip),
            'coupleDublicate'=>[$result[$indexFirst],$result[$indexSecond]]
        ];

        return $response;
    }

    public function prepareMergeContacts($request)
    {
        $mainContact=Contact::where('id',$request['mainContactId'])->first();
        $contact=Contact::where('id',$request['SecondContactId'])->first();
        $dataForUpdate=[];
        $contact_id=$mainContact['id'];
        $duplicate_id=$contact['id'];
        $mainContact['number']?'':$dataForUpdate['number']=$contact->number;
        $mainContact['site']?'':$dataForUpdate['site']=$contact->site;
        $mainContact['birthday']?'':$dataForUpdate['birthday']=$contact->birthday;
        $mainContact['city']?'':$dataForUpdate['city']=$contact->city;
        $mainContact['work']?'':$dataForUpdate['work']=$contact->work;
        $mainContact['position']?'':$dataForUpdate['position']=$contact->position;
        $mainContact['work_email']?'':$dataForUpdate['work_email']=$contact->work_email;
        $mainContact['group_id']?'':$dataForUpdate['group_id']=$contact->group_id;
        $mainContact['comment']?'':$dataForUpdate['comment']=$contact->comment;

        $this->MergeContacts($dataForUpdate,$contact_id,$duplicate_id);

        return;
    }

    public function MergeContacts($contact,$contact_id,$duplicate_id)
    {
        Contact::where('id', $contact_id)
            ->where('user_id', auth()->user()->id)
            ->update($contact);

        Contact::where('id', $duplicate_id)
            ->where('user_id', auth()->user()->id)
            ->delete();

        return;
    }

    public function deleteById($request){
        $user_id = auth()->user()->id;


        Contact::where('user_id', $user_id)
            ->whereIn('id', $request['contacts'])
            ->delete();
    }

    public function storeUniqueEmailForUser($email, $user_id)
    {
        $duplicate = Contact::where('email', $email)->where('user_id', $user_id)->first();

        return $duplicate ? false : true;
    }

    public function updateUniqueEmailForUser($email, $user_id, $contact_id)
    {
        $duplicate = Contact::where('email', $email)->where('user_id', $user_id)->where('id', '<>',
                $contact_id)->first();

        return $duplicate ? false : true;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function callLog()
    {
        return $this->hasMany(CallLog::class);
    }
}
