<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Aula;
use App\Models\Equipo;
use App\Models\Evento;
use App\Models\Insinvidviduale;
use App\Models\Insgrupale;
use App\Models\Videojuego;
use App\Models\Jugadore;


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
            'id'=>4,
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
        $individual= Insinvidviduale::all()->count();
        $grupal= Insgrupale::all()->count();
        
        $sql='SELECT SUM(v.precio) FROM videojuegos as v, insinvidviduales  WHERE v.id =  insinvidviduales.id_videjuegos';
        $totalind = DB::select('SELECT SUM(precio) as suma FROM videojuegos as v, insinvidviduales  WHERE v.id =  insinvidviduales.id_videjuegos');
        $totalgru = DB::select('SELECT SUM(precio) as suma FROM videojuegos as v, insgrupales  WHERE v.id =  insgrupales.id_videjuegos');
        $name= DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "1";');
       

        $contar = [
           'total_videojuegos' => Videojuego::all()->count(), 
           'total_jugadores' => Jugadore::all()->count(), 
           'total_aulas' => Aula::all()->count(), 
           
           'total_equipos' => Equipo::all()->count(), 
           'total_eventos' => Evento::all()->count(), 
           'total_inscripcionIndi' => Insinvidviduale::all()->count(), 
           'total_inscripcionGru' => Insgrupale::all()->count(), 
           'total_inscripciones' => round($individual + $grupal),  
           'total_recaudacion' => round($totalind[0]->suma +$totalgru[0]->suma),
           'total_recaudacionind' => $totalind[0]->suma,
           'total_recaudaciongru' => $totalgru[0]->suma,
           

        ];
        return $contar;
    }


    
    public function getEventos(){
        return Evento::select('nombre','fecha')->orderBy('fecha')->take(3)->get();
    }

    public function getVideojuegos(){
        
        $videojuegos = Videojuego::ALL();
    
        $nombres=DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "1"');
        $nombresg=DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "2"');

        $id=DB::select('SELECT id FROM videojuegos where videojuegos.id_categoria like "1"');
        $idg=DB::select('SELECT id FROM videojuegos where videojuegos.id_categoria like "2"');
       
        
        
        for($i=0; $i < sizeof($nombres);$i++){
           
           $data['label'][] = $nombres[$i]->nombre;

           $data['data'][] = Insinvidviduale::all()->where('id_videjuegos', $id[$i]->id)->count(); 
           
        }

        
        for($i=0; $i < sizeof($nombresg);$i++){
           
            
            $data['labelg'][] = $nombresg[$i]->nombre;
            $data['datag'][] = Insgrupale::all()->where('id_videjuegos',$idg[$i]->id) ->count();
         }
         
        
        
        $data['data'] = json_encode($data);
        
        return $data;
    }

    public function getVideojuegosGrupales(){
       
        $videojuegos = Videojuego::ALL();
        
        $dataGrupal = [];
        foreach( $videojuegos as $videojuegos){
            $dataGrupal['labelg'][] = $videojuegos->nombre;
            //$dataGrupal['datag'][] = Insgrupale::all()->where('id_videjuegos',$videojuegos->id) ->count();
        }
        $dataGrupal['datag'] = json_encode($dataGrupal);
        return $dataGrupal;
    }
}
