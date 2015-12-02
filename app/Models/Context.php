<?php

namespace FairHub\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Context extends HubModel
{
    use Translatable;

    public $translatedAttributes = [
        'description'
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
        'context_id',
        'description',
        'start',
        'end'
    ];

    protected $fillable = [
        'code',
        'name',
        'start',
        'end',
        'link',
        'description', //RESTA FILLABLE NEL MODEL PADRE
        'context_id'
    ];

    /**
     * Get the code-related fair.
     * @param $query Builder
     * @param $code String
     * @return Builder
     */
    public function scopeCode($query, $code)
    {
        switch(strlen($code)){
            case 2:
                $query->where('code', '=', substr($code,0,2))->whereNotNull('context_id');
                break;
            case 3:

                $query->where('code', '=', substr($code,0,3))->whereNull('context_id');
                break;
            case 5:
                $query->where('code', '=', substr($code,3,2))->whereNotNull('context_id');
                $query->whereHas('contextParent', function ($q) use ($code) {
                    $q->where('code', '=', substr($code,0,3));
                });
                break;
            default:
        }

        return $query;
    }

    /**
     * Get the code-related fair.
     * @param $query Builder
     * @param $text String
     * @return Builder
     */
    public function scopeDescNameLike($query, $text)
    {
        $query = $query->where(function($query) use ($text) {
            $query->where('description', 'ILIKE', "%$text%")
                ->orWhere('code', 'ILIKE', "%$text%");
        });
        return $query->where('description', 'ILIKE', "%$text%");
    }

    /**
     * @return string
     */
    public function getFullCodeAttribute(){
        $parent = $this->contextParent()->first();
        if ($parent !== null)
            return $parent->fullCode . $this->code;
        return $this->code;
    }

    /**
     * @return null|string
     */
    public function getParentNameAttribute(){
        $parent = $this->contextParent()->first();
        if ($parent !== null)
            return $parent->name;
        return null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contextParent(){
        return $this->belongsTo('FairHub\Models\Context', 'context_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contextChilds(){
        return $this->hasMany('FairHub\Models\Context', 'id', 'context_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('FairHub\Models\User')->withPivot('role_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(){
        return $this->belongsToMany('FairHub\Models\Role', 'context_user')->withPivot('user_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany('FairHub\Models\Category')->withPivot('order')->withTimestamps();
    }
}
