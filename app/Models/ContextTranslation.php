<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class ContextTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'description'
    ];
}
