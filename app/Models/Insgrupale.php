<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insgrupale extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'insgrupales';

    protected $fillable = ['id_jugadores','id_equipos','id_videjuegos','participantes','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'id_equipos');
    }
    
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
