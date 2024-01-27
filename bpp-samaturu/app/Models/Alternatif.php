<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'alternatifs';

    protected $fillable = ['nama_alternatif','harga_id','bahanaktif_id','dayatahan_id','hamadibasmi_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alternatifPetanis()
    {
        return $this->hasMany('App\Models\AlternatifPetani', 'alternatif_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bahanaktif()
    {
        return $this->hasOne('App\Models\Bahanaktif', 'id', 'bahanaktif_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dayatahan()
    {
        return $this->hasOne('App\Models\Dayatahan', 'id', 'dayatahan_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hamadibasmi()
    {
        return $this->hasOne('App\Models\Hamadibasmi', 'id', 'hamadibasmi_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function harga()
    {
        return $this->hasOne('App\Models\Harga', 'id', 'harga_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kecocokans()
    {
        return $this->hasMany('App\Models\Kecocokan', 'alternatif_id', 'id');
    }
    
}
