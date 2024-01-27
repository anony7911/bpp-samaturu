<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahadibasmi extends Model
{
    use HasFactory;
    protected $table = 'bahadibasmis';

    protected $fillable = [
        'nama',
        'nilai',
    ];
}
