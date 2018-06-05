<?php

if (!function_exists('cloud_link')) {
    function cloud_link($path)
    {
        return Illuminate\Support\Facades\Storage::url($path);
    }
}
