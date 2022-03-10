<?php

namespace App\Models\Services;

use App\Models\Tags\Tags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTags extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'service_tags';
    protected $fillable = ['id','service_id','tag','created_at','updated_at','deleted_at'];

    public function service(){
        return $this->hasMany(Service::class , 'service_id','id');
    }
//     public function tags(){
//        return $this->hasMany(Tags::class , 'tag_id','id');
//     }
}
