<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;

class Fair extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function editions()
    {
        return $this->hasMany('FairHub\FairEdition');
    }

    /**
     * Get the translatinos that belongs to this fair.
     */
    public function translation()
    {
        return $this->hasMany('FairHub\FairTranslation');
    }
}
