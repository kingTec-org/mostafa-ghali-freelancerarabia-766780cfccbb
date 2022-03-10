<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceImages extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'service_images';
    protected $fillable = ['id','service_id','image','created_at','updated_at','deleted_at'];
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return !empty($this->attributes['image']) ? app_url('uploads/services/'.$this->attributes['image']) : null;
    }
     public function service(){
         return $this->hasMany(Service::class , 'service_id','id');
     }

}
