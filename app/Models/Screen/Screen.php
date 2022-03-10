<?php

namespace App\Models\Screen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;

    protected $table = 'screens';
    protected $fillable = ['id', 'screen_code', 'screen_name'];

}
