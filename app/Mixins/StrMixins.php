<?php

namespace App\Mixins;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\ResponseFactory;

class StrMixins
{
    //
    public function partNumber()
    {
        return function ($part) {
            return 'AB-' . substr($part, 0, 3) . '-' . substr($part, 3);
        };
    }


    public function prefix()
    {
        return function ($string, $prefix = "AB-") {
            return $prefix . $string;
        };
    }
}
