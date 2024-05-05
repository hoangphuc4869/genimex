<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranslatedContent extends Model
 {
    use HasFactory;
    protected $fillable = [
        'from', 
        'language_code',
        'column_name',
        'translation',
        'original_content_id',
    ] ;
}