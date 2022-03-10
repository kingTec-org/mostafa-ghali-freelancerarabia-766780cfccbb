<?php

namespace App\Models\GeneralQuestions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralQuestions extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'general_questions';
    protected $fillable = ['id','question_ar','question_en','answer_en','answer_ar','created_at','updated_at','deleted_at'];
}
