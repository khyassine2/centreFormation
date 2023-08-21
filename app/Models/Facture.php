<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    public function use_form()
    {
        return $this->belongsTo(use_form::class,'idUsForm','id');
    }
}
