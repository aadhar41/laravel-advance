<?php

namespace App\QueryFilters;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Closure;

class Sort extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->orderBy("title", request($this->filterName()));
    }
}
