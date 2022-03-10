<?php

namespace App\Models\User;

use App\Models\Services\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFav extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='fav_services';
    protected $fillable = ['id','service_id','user_id','created_at','updated_at','deleted_at'];
    public function user(){
        return $this->belongsTo(User::class ,'user_id');
    }
    public function service(){
        return $this->belongsTo(Service::class , 'service_id');
    }
}
