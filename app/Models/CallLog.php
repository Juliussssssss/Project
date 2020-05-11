<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    protected $fillable = ['contact_id','created_at'];
    protected $table = 'call_log';

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
