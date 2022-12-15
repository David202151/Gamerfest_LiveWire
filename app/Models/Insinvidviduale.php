<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insinvidviduale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'insinvidviduales';

    protected $fillable = ['id_videjuegos','id_jugadores','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jugadore()
    {
        return $this->hasOne('App\Models\Jugadore', 'id', 'id_jugadores');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function videojuego()
    {
        return $this->hasOne('App\Models\Videojuego', 'id', 'id_videjuegos');
    }
    
}
