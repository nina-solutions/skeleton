<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryContext extends HubModel
{
    protected $table = 'category_context';

    public function contexts(){
        return $this->belongsToMany('FairHub\Models\Context')->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany('FairHub\Models\Category')->withTimestamps();
    }
}
