<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comic;
use App\Collection;
use Auth;

class OpenCollectionController extends Controller
{
    
  public function destroy($id, $id_collection){

    $collection=Collection::find($id_collection);

    $id_comic= $id;
    $comic= Comic::find($id);
    $img=$comic->img;
  
    $comic->collections()->where('id',$id_collection)->first()->pivot->delete();
    $comic->delete();  

    if($collection->img_url == $img){ 
      //nel caso sto eliminando il comic che da l'immagine alla raccolta devo modificare la raccolta
      
        if(count($collection->content)==0){ 
        //vuol dire che la nostra raccolta non ha più fumetti a disposizione quindi ripristino l'immmagine di default 
          $collection->img_url='http://localhost:8000/css/background.jpg';
          $collection->save();  
        }

        else{
        //nel caso in cui non è vuoto cambia l'immagine della raccolta con uno qualsiasi dei fumetti 
          $collection->img_url= $collection->content->first()->img;
          $collection->save();          
        }
  
  
      }

    $info=array($id_collection, Auth::user()->id, $id_comic);
 
    echo json_encode($info);
     
}


}
