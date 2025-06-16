<?php

use App\Models\SiteSetting;

function siteSettings()
{
    $data = SiteSetting::first();
    return $data;
}
