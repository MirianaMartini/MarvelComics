@extends('upload')

@section('sh_modal')

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
                                            <li><a href="/search/{{$collection->id}}">{{$collection->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                                                
                        @else
                       
                        <p style="margin-bottom: 0px"><a href="/home">Create your first Collection</a> to Add this Comic</p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                        @endif

                    </div>

                    </div>
                </div>
    </div>


@endsection