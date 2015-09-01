<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;

class FairEdition extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function fair()
    {
        return $this->belongsTo('FairHub\Fair');
    }
}
