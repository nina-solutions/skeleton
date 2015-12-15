<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class PressReleaseTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'body',
        'subtitle',
        'subhead'
    ];
}
