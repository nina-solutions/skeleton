<?php

namespace FairHub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class FairEdition extends Model
{
    /**
     * Get the fair that owns the edition.
     */
    public function fair()
    {
        return $this->belongsTo('FairHub\Fair');
    }

    /**
     * Get the translations that owns the fair edition.
     */
    public function translation($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany('FairHub\FairEditionTranslation');
    }

    public function fairCode()
    {
        return $this->fair()->code . $this->year;
    }

    /**
     * Scope a query to only include active fair editions.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
