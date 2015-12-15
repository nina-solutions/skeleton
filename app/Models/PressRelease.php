<?php

namespace FairHub\Models;

use Dimsav\Translatable\Translatable;

class PressRelease extends HubContent
{
    use Translatable;

    public $translatedAttributes = [
        'subhead',
        'title',
        'subtitle',
        'body',
    ];
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    //optional
    protected $with = [
        'translations'
    ];

    protected $nullable = [
        'notes',
        'reference'
    ];

    protected $fillable = [
        //'subhead',
        //'title',
        //'subtitle',
        'reference',
        'category_id',
        //'body',
        'notes',
    ];


}
