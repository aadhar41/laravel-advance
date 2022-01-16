<?php

namespace App\QueryFilters;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Closure;

class Active extends Filter
{

    public function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
