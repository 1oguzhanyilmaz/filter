<?php

namespace Oy\Traits;

trait Filter
{
    public function scopeFilter($query, QueryFilters $queryFilter, array $extraFilters = null){
        return $queryFilter->apply($query, $extraFilters);
    }
}
