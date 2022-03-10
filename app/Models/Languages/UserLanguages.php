<?php

namespace App\Models\Languages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLanguages extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'user_languages';
    protected $fillable = ['id','user_id','language','created_at','updated_at','deleted_at'];
}
