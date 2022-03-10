<?php

namespace App\Models\Comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesCommentsReplay extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'comments_reply';
    protected $fillable = ['id','comment_id','service_id','comment','created_at','updated_at','deleted_at'];
    public function comments(){
        return $this->hasMany(ServicesComments::class,'comment_id','id');
    }
}
