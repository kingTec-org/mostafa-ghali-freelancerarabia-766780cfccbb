<?php

namespace App\Models\Order;

use App\Models\Item\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovementOrderItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_movements_item';
    protected $guarded = [];
    public function item(){
        return $this->belongsTo(Item::class ,'order_item_id','id');
    }
}
