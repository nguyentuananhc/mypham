<?php

function cloud_link($path)
{
    return Illuminate\Support\Facades\Storage::url($path);
}