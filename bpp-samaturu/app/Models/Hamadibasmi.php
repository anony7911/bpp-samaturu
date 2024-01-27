<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hamadibasmi extends Model
{
    use HasFactory;
    protected $table = 'hamadibasmis';

    protected $fillable = [
        'nama',
        'nilai',
    ];
}
