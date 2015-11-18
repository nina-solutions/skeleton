<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

abstract class HubContent extends HubModel
{
    public function getContextNameAttribute(){
        $context = $this->content->context()->first();
        if ($context !== null)
            return $context->name;
        return null;
    }

    public function getContentNameAttribute(){
        $content = $this->content;
        //dd($content);
        if ($content !== null)
            return $content->name;
        return null;
    }

    /**
     * Get all of the product's photos.
     */
    public function content()
    {
        return $this->morphOne('FairHub\Models\Content', 'contentable');
    }
}
