<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends HubModel
{
    protected $nullable = [
        'content_id',
        'status_id',
        'description'
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
    /**
     * Get the status-related content
     */
    public function scopeStatus($query, $code)
    {
        return $query->where('status_id', '=', (int)$code);
    }
    /**
     * Get the contents with name or description like $text.
     */
    public function scopeDescNameLike($query, $text)
    {
        return $query->where(function($query) use ($text) {
            $query->where('description', 'ILIKE', "%$text%")
                ->orWhere('name', 'ILIKE', "%$text%");
        });
    }

    public function getContextNameAttribute(){
        $parent = $this->context()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function context(){
        return $this->hasOne('FairHub\Models\Context', 'id', 'context_id');
    }

    public function getParentNameAttribute(){
        $parent = $this->parentContent()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    public function parentContent(){
        return $this->hasOne('FairHub\Models\Content', 'id', 'content_id');
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

}
