<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'contact_email',
        'review_email',
        'first_address',
        'first_mode',
        'second_address',
        'second_mode',
        'ya_map',
        'ya_link',
        'vk_link',
        'tg_link',
        'whatsapp_link',
        'ngc_link',
        'service_disable_text',
    ];
}
