<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryContext extends HubModel
{
    protected $table = 'category_context';
    protected $fillable = [
        'context_id',
        'category_id',
        'order'
    ];

    public function context(){
        return $this->belongsTo('FairHub\Models\Context');
    }

    public function categorie(){
        return $this->belongsTo('FairHub\Models\Category');
    }
}
