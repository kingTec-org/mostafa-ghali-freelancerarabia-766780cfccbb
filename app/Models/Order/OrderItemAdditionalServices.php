<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItemAdditionalServices extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'order_items_additional_services';
    protected $fillable = ['id','order_id','service_id','additional_services_id','created_at','updated_at','deleted_at'];
}
