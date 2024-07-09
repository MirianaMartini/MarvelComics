<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comic extends Model
{
    protected $fillable = [
        'id_uff', 'title', 'img', 'description'
    ];
    
    //Aggiungo relazione ad collection
    public function raccolte() {
        return $this->belongsTo('App\Collection');
    }

     //Relazione a collection
     public function collections() {
        return $this->belongsToMany('App\Collection', 'collections_comics', 'id_comic', 'id_collection');
    } 

}
