<?php

namespace App\Models\User;

use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubCategory extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = "user_sub_categories";
    /*
     * native fluent intermediate basic
     *
     * */
    protected $fillable = [
        'user_id',
        'sub_category_id',
        'user_occupation_id',
        'category_id',

    ];


    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'user_occupation_id' => 'integer',
        'sub_category_id' => 'integer',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class  ) ;
    }

}
