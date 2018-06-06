<?php

if (!function_exists('cloud_link')) {
    function cloud_link($path)
    {
        return Illuminate\Support\Facades\Storage::url($path);
    }
}


if (!function_exists('sale_price')) {
    function sale_price($price, $sale)
    {
        return floor($price * (100 - $sale) / 100);
    }
}
