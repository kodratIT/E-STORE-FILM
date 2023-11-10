<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = ['first_name','last_name'];

    public function films(){
        return $this->BelongsToMany(Film::class,'film_actor','actor_id','film_id');
    }
}
