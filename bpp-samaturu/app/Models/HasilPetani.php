<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPetani extends Model
{
    use HasFactory;

    protected $fillable = [
        'petani_id',
        'hasil_id',
    ];
}
