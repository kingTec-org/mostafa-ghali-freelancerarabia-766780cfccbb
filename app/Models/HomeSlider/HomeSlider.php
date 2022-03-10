<?php

namespace App\Models\HomeSlider;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'home_slider';
    protected $fillable = ['id','title_1_ar','title_1_en','title_2_ar','title_2_en','description_1_ar','description_1_en',
        'description_2_ar','description_2_en','image'];
    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return !empty($this->attributes['image']) ? app_url('uploads/home_slider/'.$this->attributes['image']) : null;
    }
}
