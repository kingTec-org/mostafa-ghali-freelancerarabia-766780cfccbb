<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSettings extends Model
{
    use HasFactory,SoftDeletes;
    protected $table  ='settings';
    protected $fillable = ['id','stripe_tax','system_tax','created_at','updated_at','deleted_at'];

}
