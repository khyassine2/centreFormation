<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    // public function use_form()
    // {
    //     return $this->belongsTo(use_form::class);
    // }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class,'idCat','id');
    }
    public function use_form()
    {
        return $this->hasMany(use_form::class,'idForm','id');
    }
    public function prof()
    {
        return $this->belongsTo(User::class,'id_prof','id');
    }
}
