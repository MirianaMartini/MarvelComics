@extends('search')



@section('show')


@if ((count($array_comics) > 2))

@foreach ($array_comics as $array_comic)  

    @if ((count($array_comic) > 3)) <!-- questo vuol dire che se è maggiore di 3 possiede l'immagine -->
   
         <div class="card" style="width:15rem">
            <p id="id_comic" class="hidden">{{$array_comic["id"]}}</p>
            <img src="{{$array_comic['img']['path']}}.{{$array_comic['img']['extension']}}" class="card-img-top" style="height:15rem">
            <div class="card-body">
               <h5 class="card-title">{{$array_comic["title"]}}</h5>
               @if ($array_comic["description"]==null)
                 <p class="card-text hidden">No Description for this comic</p>
                @else
               <p class="card-text hidden">{{$array_comic["description"]}}</p>
               @endif
            
               
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg">
                Info
                </button>

            
   
            </div>
        </div> 

    @endif

@endforeach

@else <!-- FARE IL CONTROLLO NEL CASO SI CERCASSE UN FUMETOO CHE NON ESISTE -->
    <div class="card" style="width:15rem">
        
        <h5 style="padding: 20px 20px;"><strong>{{$not_found}}</strong>  <em>Not Found</em></h5>
    

    </div> 

@endif




    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                     <div class="modal-body">
                     <div class="row">
                        <span class="hidden"></span>
                        <div class="col-md-5"><img id="myImage" class="card-img-left" src="" alt="" style="weight: 380px; height: 400px;"></div>
                        <div class="col-md-7 ml-auto" style="margin-left:20px;"><strong >Description:</strong><br/> <p class="class-text"></p></div>
                    </div>

                        
                       
                     </div>
                     
                      
                     <div class="modal-footer">
                       
                        @if ((count($collections) > 0))
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <div class="btn-group dropup">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Add
                                        </button>
                                        <div class="dropdown-menu">
                                        
                                        @foreach($collections as $collection)
                                            <li>
                                              <div>
                                                <p class="hidden coll">{{$collection->id}}</p>
                                                <button class="btn btn-light">{{$collection->title}}</button>
                                              </form>
                                              </div> 
                                            </li>
                                        @endforeach
                                        </form>
                                    </ul>
                                </div>


                                <form method="post" >
                                @csrf
                                  
                                </form>
                                
                                                                
                        @else

                        
                       
                        <p style="margin-bottom: 0px"><a href="/home">Create your first Collection</a> to Add this Comic</p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                        @endif

                    </div>

                    </div>
                </div>
    </div>


@endsection


