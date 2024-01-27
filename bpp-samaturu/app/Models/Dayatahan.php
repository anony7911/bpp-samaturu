<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dayatahan extends Model
{
    use HasFactory;
    protected $table = 'dayatahans';

    protected $fillable = [
        'nama',
        'nilai',
    ];
}
