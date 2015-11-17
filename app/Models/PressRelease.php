<?php

namespace FairHub\Models;

class PressRelease extends HubContent
{
    protected $fillable = [
        'subhead',
        'title',
        'subtitle',
        'reference',
        'category_id',
        'body',
        'notes',
    ];


}
