@extends('standard');

 

    @section('open_delete')
       <a href="/delete/{{$collection->id}}" style="margin-left: 10px; color: white!important;">Delete <em>{{$collection->title}}</em></a>
    @endsection

    @section('open')
        <main class="title_area">
  
          <h1 id="title"><strong> {{$collection->title}}</strong></h1>
          

        </main>
  
        <section class="my_collection">    

            
        @foreach ($array_comics as $array_comic)  

              <div class="card" style="width:15rem">
                <p id="id_comic" class="hidden">{{$array_comic->id}}</p>
                <img src="{{$array_comic->img}}" class="card-img-top" style="height:15rem">
                <div class="card-body">
                  <h5 class="card-title">{{$array_comic->title}}</h5>
                  @if ($array_comic->description==null)
                    <p class="card-text hidden">No Description for this comic</p>
                    @else
                  <p class="card-text hidden">{{$array_comic->description}}</p>
                  @endif
                
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg">
                    Info
                    </button>

                

                </div>
            </div> 

        @endforeach  

   

        
        </section>   



        <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                        <h4 class="id_collection hidden">{{$collection->id}}</h4>
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
                       
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
                    </div>

                    </div>
                </div>
    </div>





@endsection
