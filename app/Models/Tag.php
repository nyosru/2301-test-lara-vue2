<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * records, принадлежащие tags.
     */
    public function records()
    {
        return $this->belongsToMany( Record::class);
    }
}
