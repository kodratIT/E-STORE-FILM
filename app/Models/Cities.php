<?php

namespace App\Models;

use App\Models\Countries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cities extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function country(){
        return $this->belongsTo(Countries::class);
    }

}
