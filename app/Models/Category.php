<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends HubModel
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function contexts(){
        return $this->belongsToMany('FairHub\Models\Context')->withTimestamps();
    }
}
