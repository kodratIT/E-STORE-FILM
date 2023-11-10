<?php

namespace App\Models;

use App\Models\Film;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function films(){
        return $this->BelongsToMany(Film::class,'film_category','category_id');
    }



}
