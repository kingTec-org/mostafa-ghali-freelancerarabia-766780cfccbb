<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLanguages extends Model
{
    use HasFactory, SoftDeletes;

    const LevelList = [
        'native' => 1,
        'fluent' => 2,
        'intermediate' => 3,
        'basic' => 4,
    ];
    protected $table = "user_languages";
    /*
     * native fluent intermediate basic
     *
     * */
    protected $fillable = [
        'user_id',
        'language_id',
        'level',

    ];


    protected $casts = [
        'user_id' => 'integer',
        'language_id' => 'integer',
        'level' => 'integer',
    ];


}
