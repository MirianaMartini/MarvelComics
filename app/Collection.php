<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Collection extends Model
{
   
    protected $fillable = [
        'title', 'img_url', 'user_id', 
    ];
    //Aggiungo relazione ad user
    public function user() {
        return $this->belongsTo('App\User');
    }

    //Relazione a comic
    
    public function content() {
        return $this->belongsToMany('App\Comic', 'collections_comics', 'id_collection', 'id_comic' );
    } 

}

