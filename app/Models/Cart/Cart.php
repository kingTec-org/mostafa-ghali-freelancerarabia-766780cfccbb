<?php

namespace App\Models\Cart;

use App\Models\Services\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
        protected $fillable = ['cart_id', 'user_id', 'service_id', 'quantity', 'price', 'total_price','notes','attachment'];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
}
