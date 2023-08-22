@extends('layouts.partials.main')
@section('content')

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Senior Account Master List</h4>
                </div>
                <div>
                  <a href="{{route('send-sms')}}">
                     <button type="button" class="btn btn-primary btn-icon-text">
                          <i class="ti-email btn-icon-prepend"></i>                                                    
                          Send Message (Test)
                   </button>
                  </a>
                   <a href="{{route('add-senior')}}">
                     <button type="button" class="btn btn-success btn-icon-text">
                          <i class="ti-plus btn-icon-prepend"></i>                                                    
                          Register New Senior
                   </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                         <h1 class="card-title mb-5">Senior Completed Account List</h1>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th>#</th>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Date Submitted</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($completedUsers as $key => $completed)
                         <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$completed->first_name}}</td>
                          <td>{{$completed->middle_name}}</td>
                          <td>{{$completed->last_name}}</td>
                          <td>{{$completed->created_at->format('M. d, Y')}}</td>
                          <td>
                           <button type="button" class="btn-sm btn-inverse-warning btn-fw btn-icon-text"><i class="ti-comment-alt btn-icon-prepend"></i> Message</button>
                            <a href="{{route('pending-show' , $completed->user_id)}}">
                              <button type="button" class="btn-sm btn-inverse-primary btn-fw btn-icon-text"><i class="ti-eye btn-icon-prepend"></i> View</button>
                            </a>
                             <button type="button" class="btn-sm btn-inverse-danger btn-fw btn-icon-text deleteUser" value="{{$completed->user_id}}" data-userid="{{$completed->user_id}}"><i class="ti-trash btn-icon-prepend"></i> Delete</button>

                          </td>
                        </tr>
                        @empty
                        <tr class="text-center bg-warning" >
                          <td colspan="6">No Data Available</td>
                        </tr>
                       @endforelse
                      </tbody>
                    </table>
                     {{$completedUsers->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>

  <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Senior Account</h5>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to delete this senior account?</h6>
                <form action="{{route('senior-destroy-account','id')}}" method="POST">
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


