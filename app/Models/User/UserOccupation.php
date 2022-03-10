<?php

namespace App\Models\User;

use App\Models\Category\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOccupation extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = "user_occupation";
    /*
     * native fluent intermediate basic
     *
     * */
    protected $fillable = [
        'user_id',
        'category_id',
        'from',
        'to',

    ];


    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'from' => 'integer',
        'to' => 'integer',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userSubCategories()
    {
        return $this->hasMany(UserSubCategory::class , 'user_occupation_id'  ) ;
    }

}
