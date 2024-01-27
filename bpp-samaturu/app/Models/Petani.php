<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'petanis';

    protected $fillable = ['nama','nik','alamat','no_hp','luas_lahan','status','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alternatifPetanis()
    {
        return $this->hasMany('App\Models\AlternatifPetani', 'petani_id', 'id');
    }

}
