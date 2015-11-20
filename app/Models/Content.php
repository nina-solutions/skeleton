<?php

namespace FairHub\Models;

class Content extends HubModel
{
    protected $nullable = [
        'content_id',
    ];
    protected $attributes = [
        'status_id' => 1,
    ];

    protected $fillable = [
        'name',
        'start',
        'end',
        'link',
        'description',
        'status_id',
        'content_id',
        'context_id'
    ];
//HIDE from Json eventually unwanted fields
    protected $hidden = [
        'context_id',
        'content_id',
        'status_id',
        'contentable_type'
    ];
    /**
     * Get the status-related content
     */
    public function scopeStatus($query, $code)
    {
        return $query->where('status_id', '=', (int)$code);
    }

    public function getContextNameAttribute(){
        $parent = $this->context()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function getParentNameAttribute(){
        $parent = $this->contentParent()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }


    public function context(){
        return $this->belongsTo('FairHub\Models\Context', 'context_id', 'id');
    }

    public function contentChilds(){
        return $this->hasMany('FairHub\Models\Content', 'id', 'content_id');
    }

    public function contentParent(){
        return $this->belongsTo('FairHub\Models\Content', 'content_id', 'id');
    }

    public function getStatusNameAttribute(){
        $status = $this->status()->first();
        if ($status !== null)
            return $status->name;
        return null;
    }
    public function getStatusCodeAttribute(){
        $status = $this->status()->first();
        if ($status !== null)
            return $status->code;
        return null;
    }
    public function status(){
        return $this->hasOne('FairHub\Models\Status', 'id', 'status_id');
    }

    public function transitions(){
        return StatusTransition::from($this->status_id)->get()->pluck('name', 'to_status_id');
    }

    public function contentable(){
        return $this->morphTo();
    }

}
