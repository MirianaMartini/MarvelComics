<link rel="shortcut icon" href="http://localhost:8000/css/logo.PNG" />
@extends('standard');

    @section('title', 'Home MC');

      @section('home')

        <main class="py-4">
            
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card new bg-dark text-white">
                            <div class="card-header"> <strong><em> CREATE NEW COLLECTION! </em></strong></div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <div class="div_form">
                                   
                                    <form method="POST" action="/home">
                                    @csrf
                                        <div class="form-group row">
                                            <label for="collection" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Title: ') }}</strong></label>

                                            <div class="col-md-8">
                                                <input  class="col-md-8 col-form-label text-md-right" name="title_collection" type="text" placeholder="New Collection Title">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 offset-md-4">
                                                <button type="submit" class="btn btn-danger">
                                                    {{ __('Create') }}
                                                </button>

                                            </div>
                                        </div>

                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
    </div>



   <section class="my_collection">    


       @foreach ($collections as $collection)
            <div class="card" style="width:15rem">
            <form method="GET" action="/home/{{$collection->id}}/{{$collection->user_id}}">
        
                <img src="{{$collection->img_url}}" class="card-img-top" style="height:15rem">
                <div class="card-body" style="padding-bottom: 0px;">
                    <h5 class="card-title">{{$collection->title}}</h5>
            
                       <button class="btn btn-primary" >Open</button>      
            </form>

                </div>
            </div> 
     
       @endforeach
    
   

    

   
@endsection