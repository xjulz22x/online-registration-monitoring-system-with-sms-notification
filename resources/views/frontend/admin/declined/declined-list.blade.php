@extends('layouts.partials.main')
@section('content')

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Senior Account Master List</h4>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                         <h1 class="card-title mb-5">Senior declined Account List</h1>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Date Submitted</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($pendings as $pending)
                         <tr>
                          <td>{{$pending->first_name}}</td>
                          <td>{{$pending->middle_name}}</td>
                          <td>{{$pending->last_name}}</td>
                          <td>{{$pending->created_at->format('M. d, Y')}}</td>
                          <td>
                            <form action="{{route('senior-restore')}}" method="POST">
                                @method("PUT")
                                @csrf
                                <input type="hidden" value="{{$pending->id}}" name="user_id">
                                <button type="submit" class="btn-sm btn-inverse-success btn-fw btn-icon-text restoreUser"><i class="ti-reload btn-icon-prepend"></i> Restore</button>
                                 <button type="button" class="btn-sm btn-inverse-danger btn-fw btn-icon-text deleteUser" value="{{$pending->user_id}}" data-userid="{{$pending->user_id}}"><i class="ti-trash btn-icon-prepend"></i> Delete</button>
                            </form>
                           
                          </td>
                        </tr>
                        @empty
                        <tr class="text-center bg-warning" >
                          <td colspan="5">No Data Available</td>
                        </tr>
                       @endforelse
                      </tbody>
                    </table>
                     {{$pendings->links()}}
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

