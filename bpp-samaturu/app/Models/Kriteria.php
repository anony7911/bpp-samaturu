<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'kriterias';

    protected $fillable = ['nama','bobot','tipe'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subkriterias()
    {
        return $this->hasMany('App\Models\Subkriteria', 'kriteria_id', 'id');
    }

}
