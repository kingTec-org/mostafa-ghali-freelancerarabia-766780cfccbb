<?php

namespace App\Models\Label;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';
    protected $fillable = ['id', 'screen_id', 'language_id', 'label_id', 'label_text_en', 'label_text_automated', 'label_text_override'];

}
