<?php

namespace FairHub\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function getStatusNameAttribute(){
        $status = $this->content->status()->first();
        if ($status !== null)
            return $status->name;
        return null;
    }
    public function getStatusCodeAttribute(){
        $status = $this->content->status()->first();
        if ($status !== null)
            return $status->code;
        return null;
    }

    public function scopeFairCode($query, $code)
    {
        $var = get_class($this);
        $tmp = explode('\\', $var);
        $var = $tmp[count($tmp)-1];
        $raw = '';
        if (strlen($code) == 3){
            $raw = DB::raw("SELECT cnt.contentable_id FROM contents as cnt JOIN contexts as cxt ON cnt.context_id = cxt.id WHERE cnt.contentable_type LIKE '%$var' AND cxt.code = '$code'");
        }elseif(strlen($code) == 5){
            $parentCode = substr($code, 0, 3);
            $childCode = substr($code, 3, 2);
            $raw = DB::raw("SELECT cnt.contentable_id FROM contents as cnt JOIN contexts as cxt ON cnt.context_id = cxt.id JOIN contexts pcxt ON cxt.context_id = pcxt.id WHERE cnt.contentable_type LIKE '%$var' AND cxt.code = '$childCode' AND pcxt.code = '$parentCode'");
        }
        $res = [];
        $sel = DB::select($raw);
        foreach ($sel as $item) {
            $res[] = $item->contentable_id;
        }
        $query = $query->whereIn('id', $res);

        return $query;
    }

    /**
     * Get all of the product's photos.
     */
    public function content()
    {
        return $this->morphOne('FairHub\Models\Content', 'contentable');
    }
}
