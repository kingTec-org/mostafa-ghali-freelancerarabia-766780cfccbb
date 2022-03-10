<?php

namespace App\Models\Tags;

use App\Models\Services\ServiceTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'tags';
    protected $fillable = ['id','name_ar','name_en','created_at','updated_at','deleted_at'];

//    public function serviceTags(){
//        return $this->belongsTo(ServiceTags::class , 'id','tag_id');
//    }

}
