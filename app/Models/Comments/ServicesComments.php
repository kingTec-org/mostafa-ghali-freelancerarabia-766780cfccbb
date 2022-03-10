<?php

namespace App\Models\Comments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesComments extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'service_comments';
    protected $fillable = ['id','service_id','user_id','seller_id','comment','rate','created_at','updated_at','deleted_at'];
    public function replay(){
        return $this->belongsTo(ServicesCommentsReplay::class ,'id','comment_id');
    }

}
