<?php

namespace FairHub\Models;

class StatusTransition extends HubModel
{
    /**
     * Get the code-related fair.
     */
    public function scopeFrom($query, $status_id)
    {
        return $query->where('from_status_id', '=', (int) $status_id);
    }
    public function scopeTo($query, $status_id)
    {
        return $query->where('to_status_id', '=', (int) $status_id);
    }


}
