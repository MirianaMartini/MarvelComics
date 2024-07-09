<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Collection;
use App\Comic;
use Auth;


class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {   
        return view('search');
    }

    public function  api(){
        $comic_to_find= request('title_comic');

        $comic_to_find=str_replace(" ", "%20" , "$comic_to_find");

         $ts = time();
         $public_key = 'ac4b93924842329b0739642daeadb236';
         $private_key = '760a92e77416268623d66418196df010faef0a44';
         $hash = md5($ts . $private_key . $public_key);
        
         $query_params = [
            'apikey' => $public_key,
            'ts' => $ts,
            'hash' => $hash
          ];
        
        //convert array in una stringa nel formato get
        $query = http_build_query($query_params);

        //Inizializzo una sessione cURL
        //settare la url da chiamare con Curl. La chiamata avverrà in GET.  
        //specificare header HTTP tramite curl
        //il ritorno lo inserisco in response 
        //e infine chiudo la sessione curl
        
    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_URL, "https://gateway.marvel.com:443/v1/public/comics?titleStartsWith=".$comic_to_find."&".$query);
    //     $headers=array('Accept: */*', 'If-None-Match: f0fbae65eb2f8f28bdeea0a29be8749a4e67acb3');
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //     $response=curl_exec($curl);
    //     curl_close($curl);
     
    
         //make the request
         // questa funzione mi restituisce sottoforma di stringa il contenuto di un file (in questo caso in remoto)
        $response = file_get_contents("https://gateway.marvel.com:443/v1/public/comics?titleStartsWith=".$comic_to_find."&".$query);

        //convert the json string to an array
        $response_data = json_decode($response, true);
        
        $ritorno=[array()];

        $i=0;
        
        $array_comics=$response_data['data']['results'];

        if($response_data !== null){
            foreach ($array_comics as $array_comic){
                
                foreach($array_comic as $element=> $value){  //per ogni fumetto devo conservarmi titolo, id identificativo, immagine
                    
                    if($element=='id'){
                        $ritorno[$i]['id']=$value;
                    }
                    if ($element=='title'){
                        $ritorno[$i]['title']=$value;
                    }
                    if ($element=='description'){
                        $ritorno[$i]['description']=$value;
                    }
                    
                    if($element=='images'){
                        foreach($value as $image=>$info){
                            $ritorno[$i]['img']=$info;
                        }
                    }
        
                    //se entra in questo if vuol dire che è terminata la lettura del primo fumetto e bisogna passare all'altro
                    if ($element=='events'){
                        $i=$i+1;
                    }
                
                }
            
            }
          }

        $collections= Collection::where('user_id', Auth::user()->id)->get();
      
        return view('upload')
               ->with("not_found", $comic_to_find)
               ->with("array_comics", $ritorno)
               ->with("collections", $collections);
      
    }


 public function add(){

    $collection= Collection::find(request('id_collection'));        
        if($collection->user_id== Auth::user()->id){ 
        //se la collezione a cui voglio associare un comic appartiene all'utente loggato procedo       

            $comic= new Comic();

            $comic->id_uff=request('id_comic');
            $comic->title=request('title_c');
            $comic->img=request('img_c');
            $comic->description=request('description_c');

            $comic->save();

            $comic->collections()->attach(request('id_collection'));

            if($collection->img_url=="http://localhost:8000/css/background.jpg"){
                
              $collection->img_url=request('img_c');
              $collection->save();

            }

        }

    }




    


}
