<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class File extends Model
{
    public function getSrcAttribute()
    {
        return Storage::url($this->file_name);
    }
}
