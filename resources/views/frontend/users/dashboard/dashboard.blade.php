@extends('layouts.partials.main')
@section('content')

<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                      <h4 class="font-weight-bold mb-0">Your Dashboard</h4>
                </div>
                <div>
                
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="text-center">
                    {{-- <img src="{{Auth::user()->registrations->sc_picture ? asset('uploads/' . Auth::user()->registrations->sc_picture ): ''}}" class="rounded" alt="..." style="width: 200px"> --}}
                  
                  </div>

                  
                  
                     @forelse ($posts as $post )
                     <h1 class="card-title mb-5">Posts And Announcements</h1>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card text-dark ps-1">
                              <div class="card-body">
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-5">
                                        <div class="d-flex flex-row align-items-center">
                                          <i class="ti-user icon-sm text-danger"></i>
                                          <p class="mb-0 ms-1 font-weight-bold">
                                            {{$post->author->first_name .' '. $post->author->last_name}} 
                                          </p>
                                        </div>
                                         <div class="d-flex flex-row align-items-center">
                                          <i class="ti-calendar icon-sm text-danger"></i>
                                          <p class="mb-0 ms-1">
                                            {{$post->created_at->toDateString()}}
                                          </p>
                                        </div>
                                        @if(Auth::user()->id === $post->author_id)
                                          <div class="d-flex flex-row align-items-right">
                                          <a href="{{route('edit-post' , $post->id)}}">
                                             <p class=" mb-0 ms-3 font-weight-bold">
                                            <button type="button" class="btn btn-success btn-rounded btn-icon">
                                              <i class="ti-pencil"></i>
                                            </button>
                                          </p>
                                          </a>
                                          <p class=" mb-0 ms-3 font-weight-bold">
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon deleteUser" value="{{$post->id}}" data-userid="{{$post->id}}">
                                              <i class="ti-trash"></i>
                                            </button>
                                          </p>
                                        </div>
                                        @endif   
                                </div>
                               
                                  <div class="row">
                                    
                                      <div class="col-md-6">
                                        @if ($post->post_image == null)
                                          <img class="d-block image" style="height: 300px; width: 450px" src="https://upload.wikimedia.org/wikipedia/commons/6/6c/No_image_3x4.svg" alt="First slide">
                                        @else
                                          <img class="d-block image" onclick="openModal1()" style="height: 300px; width: 450px" src="{{asset('uploads/posts/image/'.$post->post_image)}}" alt="First slide">
                                        @endif
                                       
                                      </div>
                                         <div class="col-md-6">
                                        <h4 class="font-weight-bold mb-3 text-dark ps-1 diplay-4">{{$post->title}}</h4>
                                        <p class="font-weight-light mb-5" style=" white-space: pre-wrap;">{{$post->content}}</p>
                                        </div>
                                    </div>
                              </div>
                            </div>
                          </div>
                          @empty
                          <div class="d-flex align-items-center d-flex justify-content-center mt-5 mb-5">
                             <i class="ti-alert icon-md text-danger"></i>
                            <h4 class="mb-0 ms-1">No Post Available!</h4>
                          </div>
                        @endforelse
                          {{$posts->links()}}
                      
                    </div>
                  </div>
              </div>
            
        </div>


<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to Delete this Post?</h6>
                <form action="{{route('post-destroy','id')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection()
@section('scripts')
<script>
   $(document).on('click','.deleteUser',function(){
    var userID=$(this).attr('data-userid');
    $('#id').val(userID); 
    $('#DeleteModal').modal('show');
    });

    $(document).on('click','.cancel', function(){
        $('#DeleteModal').modal('hide');
    });
</script>
@endsection()

