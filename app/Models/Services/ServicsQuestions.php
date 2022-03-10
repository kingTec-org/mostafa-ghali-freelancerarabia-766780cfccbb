<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicsQuestions extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'service_questions';
    protected $fillable = ['id','service_id','question','answer','created_at','updated_at','deleted_at'];
}
