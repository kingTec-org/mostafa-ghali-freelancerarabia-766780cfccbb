<?php

namespace App\Models\Tags;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTags extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'user_tags';
    protected $fillable = ['id','user_id','tag','created_at','updated_at','deleted_at'];

}
