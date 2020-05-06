<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function saveAvatar($request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            return $data['path'] = $file->store('avatars','public');
        }
    }
}
