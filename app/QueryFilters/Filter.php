<?php

namespace App\QueryFilters;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Closure;

abstract class Filter
{

    /**
     * Undocumented function
     *
     * @param object $request
     * @param Closure $next
     * @return void
     */
    public function handle($request, Closure $next)
    {

        if (!request()->has($this->filterName())) {
            return $next($request);
        }

        $builder = $next($request);

        $this->applyFilter($builder);

        return $builder->where("active", request("active"));
    }


    protected abstract function applyFilter($builder);


    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }
}
