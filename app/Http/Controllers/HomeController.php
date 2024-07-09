<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Collection;
use App\Comic;
use Auth;

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
        $collections= Collection::where('user_id', Auth::user()->id)->get();

        return view('home', compact('collections'));
    }

    public function create()
    {       

        if (request('title_collection')!=''){ //nel caso in cui cliccassi il pulsante senza aver inserito nulla

            $collection= new Collection();

            $collection->title=request('title_collection');
            $collection->img_url='http://localhost:8000/css/background.jpg';
            $collection->user_id= Auth::user()->id;   

            $collection->save();
        }

        return redirect('/home');

    }

    public function  open($id, $id_user){

        //aggiungi il controllo che la raccolta appartenga all'utente
        if($id_user==Auth::user()->id){
            $collection= Collection::find($id);
            $array_comics= $collection->content()->get(); 
      
            
            return view('open')
                  ->with("array_comics", $array_comics)
                  ->with("id_user", Auth::user()->id)
                  ->with("collection", $collection);
        }
        else return view('home');
        
    }

    public function destroy($id){

        $collection= Collection::find($id);

        $collection->content()->delete(); //elimino i comic associati alla raccolta da eliminare 
        $collection->delete();   //elimino la raccolta
        
        return redirect('/home');
    }
    
   


}
