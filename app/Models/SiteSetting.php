<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'logo',
        'chairman_image',
        'chairman_text',
        'chairman_text_bn',
        'secretary_text',
        'secretary_text_bn',
        'secretary_image',
        'language',
        'status',
    ];
}
