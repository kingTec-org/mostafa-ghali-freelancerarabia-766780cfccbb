<?php

namespace App\Models\Order;

use App\Models\Item\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $guarded = [];

    public function items(){

        return $this->hasMany(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

}
