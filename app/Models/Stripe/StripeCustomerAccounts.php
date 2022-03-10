<?php

namespace App\Models\Stripe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class StripeCustomerAccounts extends Model
{
    use HasFactory,SoftDeletes ;
    protected $table = 'stripe_customers_accounts';

    protected $fillable = ['id','customer_id','customer_stripe_id','customer_stripe_account','created_at','updated_at','deleted_at'];
}
