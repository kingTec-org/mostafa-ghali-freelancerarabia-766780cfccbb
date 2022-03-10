<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard = 'admin';
    protected $table ='admin';
    protected $fillable = [
        'name', 'email', 'password', 'service_owner', 'user_type','service_owner','country','description'
        ,'otp','is_verified'  ,'social_provider_id','messages_push_notifications','social_provider'  ,
        'active','deactivation_reason','deactivation_note','image','work_title','graduation_date',
        'education','university','certificate_image','login_at','logout_at','device_key','response_speed','created_at','updated_at','deleted_at',
    ];
    protected $appends = ['image'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getImageAttribute()
    {
        return !empty($this->attributes['image']) ? app_url('uploads/admin_image/' . $this->attributes['image']) : app_url('web_ar/img/default-avatar.jpg');
    }

}
