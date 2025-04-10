<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'title1', 'title2', 'description', 'inside', 'district', 'city', 'country', 'cellphone', 'office_phone', 'email', 'facebook', 'instagram', 'youtube', 'twitter', 'linkedin', 'tiktok', 'whatsapp',  'form_email', 'business_hours', 'schedule', 'mensaje_whatsapp', 'hero_video_url'];
}
