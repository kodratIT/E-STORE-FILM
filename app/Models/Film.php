<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Language;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = ['id'];

    public function languages()
    {
        return $this->BelongsTo(Language::class,'language_id');
    }

    public function category(){
        return $this->BelongsToMany(Category::class,'film_category','film_id');
    }
    public function actor(){
        return $this->BelongsToMany(Actor::class,'film_actor','film_id');
    }
    public function actors(){
        return $this->BelongsToMany(Actor::class,'film_actor','film_id');
    }

    public function categories(){
        return $this->BelongsToMany(Category::class,'film_category','film_id');
    }
}
