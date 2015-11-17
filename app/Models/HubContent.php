<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

abstract class HubContent extends HubModel
{

    /**
     * Get all of the product's photos.
     */
    public function contents()
    {
        return $this->morphMany('FairHub\Models\Content', 'contentable');
    }
}
