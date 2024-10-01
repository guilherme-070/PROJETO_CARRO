<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carro extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function modelos(){
        return $this->belongsTo(Modelo::class);
    }


    public function colors(){
        return $this->belongsTo(Color::class, 'color_id');
    }


    public function estados(){
        return $this->belongsTo('App\Models\Estado');
    }
}
