<link rel="shortcut icon" href="http://localhost:8000/css/logo.PNG" />
@extends('standard');

    @section('title', 'Search MC');

    @section('search')
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card new bg-dark text-white">
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif


                                    <div class="div_form">
                                    
                                        <form method="POST" action="/search">
                                        @csrf
                                        <div class="form-group row">
                                                <label for="comic" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Comic: ') }}</strong></label>

                                                <div class="col-md-8">
                                                    <input  class="col-md-8 col-form-label text-md-right" name="title_comic" type="text" placeholder="Title comic">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-12 offset-md-4">
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __('Search') }}
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

    


    <section class="my_collection">       
            @yield('show')
            
        
    </section>   


@endsection
