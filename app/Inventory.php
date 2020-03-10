<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded  = ['id'];

    public function ownedBy()
    {
        return $this->belongsTo(User::class);
    }
}
