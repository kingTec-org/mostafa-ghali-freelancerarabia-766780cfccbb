<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalServices extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'additional_services';
    protected $fillable = ['id','service_id','title','price','deliver_time','deliver_at_same_time',
        'additional_days','created_at','updated_at','deleted_at'];

    public function Services(){
        return $this->hasMany(Service::class , 'service_id','id');
    }
}
