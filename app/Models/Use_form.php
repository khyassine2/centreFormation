<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class use_form extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function formation()
    {
        return $this->belongsTo(formation::class,'idForm','id');
    }
    public function facture()
    {
        return $this->hasOne(facture::class,'idUsForm','id');
    }
}
