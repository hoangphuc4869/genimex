<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\TranslatedContent;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image', 'category_id', 'user_id', 'slug', 'status'];

    public function translatedContents(){
        return $this->hasMany('TranslatedContent::class','original_content_id');
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->diffForHumans()
        );
    }

    public function scopePublished($query)
    {
        return $query->where('status', true);
    }

    public function getNextAttribute()
    {
        return static::wherecategoryId($this->category_id)->where('id', '>', $this->id)->published()->orderBy('id', 'asc')->first();
    }

    public function getPreviousAttribute()
    {
        return static::wherecategoryId($this->category_id)->where('id', '<', $this->id)->published()->orderBy('id', 'desc')->first();
    }

    public function getImageAttribute($value)
    {
        if (!$value) {
            return asset('import/assets/post-pic-dummy.png');
        }

        return asset("storage/$value");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}