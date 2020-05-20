<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    protected $fillable = ['contact_id','created_at'];
    protected $table = 'call_log';

    public function prepareToCreate($contact_id)
    {
        $log['created_at'] = gmdate("Y-m-d H:i:s", time());
        $log['contact_id'] = $contact_id;

        CallLog::insert($log);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
