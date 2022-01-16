<?php

namespace App\QueryFilters;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Closure;

class MaxCount extends Filter
{
    public function applyFilter($builder)
    {
        return $builder->take(request($this->filterName()));
    }
}
