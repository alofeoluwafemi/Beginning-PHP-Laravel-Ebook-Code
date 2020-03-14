<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $guarded  = ['id'];

    public function ownedBy()
    {
        return $this->belongsTo(User::class);
    }
}
