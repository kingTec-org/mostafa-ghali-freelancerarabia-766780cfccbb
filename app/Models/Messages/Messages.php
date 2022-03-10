<?php

namespace App\Models\Messages;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'messages';
    protected $fillable = ['id','sender_id','receiver_id','message','is_read','read_at','created_at','updated_at','deleted_at'];

    public function Sender(){
        return $this->hasMany(User::class ,'id','sender_id');
    }
}
