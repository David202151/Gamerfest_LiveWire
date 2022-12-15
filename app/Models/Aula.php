<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'aulas';

    protected $fillable = ['nombre','edificio','direccion','observacion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'id_aulas', 'id');
    }
    
}
