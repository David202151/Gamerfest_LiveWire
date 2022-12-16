<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Equipo;
use App\Models\Evento;
use App\Models\Insinvidviduale;
use App\Models\Insgrupale;
use App\Models\Videojuego;
use App\Models\Jugadore;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contar = $this->getContar();
        $data = $this->getVideojuegos();
        $eventos = $this->getEventos();
        $dataGrupal =$this->getVideojuegosGrupales();

        $mayorInd = [
            'id'=>1,
            'num_ind'=>Insinvidviduale::all()->where('id_videjuegos',3)->count()
        ];
        $top_ind=[
            'nombre'=>(Videojuego::select('nombre')->where('id',$mayorInd['id'])->first()->nombre),
            'num_ind'=>$mayorInd['num_ind'],
            
        ];

        $mayorInd = [
            'id'=>1,
            'num_ind'=>Insinvidviduale::all()->where('id_videjuegos',3)->count()
        ];
        $top_ind=[
            'nombre'=>(Videojuego::select('nombre')->where('id',$mayorInd['id'])->first()->nombre),
            'num_ind'=>$mayorInd['num_ind'],
            
        ];
        
        return view('dashboard.home',[
            'contar'=>$contar,
            'top_ind'=>$top_ind,
            'eventos'=>$eventos,
            'dataGrupal'=>$dataGrupal,
            
        ],$data);
    }
    public function getContar()
    {
        $contar = [
           'total_videojuegos' => Videojuego::all()->count(), 
           'total_jugadores' => Jugadore::all()->count(), 
           'total_aulas' => Aula::all()->count(), 
           
           'total_equipos' => Equipo::all()->count(), 
           'total_eventos' => Evento::all()->count(), 
           'total_inscripcionIndi' => Insinvidviduale::all()->count(), 
           'total_inscripcionGru' => Insgrupale::all()->count(), 
        ];
        return $contar;
    }
    
    public function getEventos(){
        return Evento::select('nombre','fecha')->orderBy('created_at')->take(3)->get();
    }

    public function getVideojuegos(){
        
        $videojuegos = Videojuego::ALL();
        $inscripccion = Insinvidviduale::all();
        
        
        $data = [];
        foreach( $videojuegos as $videojuegos){

           $data['label'][] = $videojuegos->nombre;
           $data['data'][] = Insinvidviduale::all()->where('id_videjuegos',$videojuegos->id) ->count();
           
           $data['labelg'][] = $videojuegos->nombre;
           $data['datag'][] = Insgrupale::all()->where('id_videjuegos',$videojuegos->id) ->count();
        }
        $data['data'] = json_encode($data);
        $data['datag'] = json_encode($data);
        return $data;
    }

    public function getVideojuegosGrupales(){
       
        $videojuegos = Videojuego::ALL();
        
        $dataGrupal = [];
        foreach( $videojuegos as $videojuegos){
            $dataGrupal['labelg'][] = $videojuegos->nombre;
            $dataGrupal['datag'][] = Insgrupale::all()->where('id_videjuegos',$videojuegos->id) ->count();
        }
        $dataGrupal['datag'] = json_encode($dataGrupal);
        return $dataGrupal;
    }
}
