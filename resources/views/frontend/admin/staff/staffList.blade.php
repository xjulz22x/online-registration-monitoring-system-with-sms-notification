@extends('layouts.partials.main')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Staff List</h4>
                </div>
                <div>
                    <a href="{{route('add-staff')}}">
                     <button type="button" class="btn btn-success btn-icon-text">
                          <i class="ti-plus btn-icon-prepend"></i>                                                    
                          Create New Staff
                   </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-5">System Staff Master List</h1>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Date Registered</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($staffs as $staff)
                            <tr>
                          <td>{{$staff->first_name}} </td>
                          <td>{{$staff->last_name}} </td>
                           <td>{{$staff->created_at->toDateString()}} </td>
                          <td>
                            <a href="{{route('show-staff' , $staff->id)}}">
                            <button type="button" class="btn-sm btn-inverse-primary btn-fw btn-icon-text"><i class="ti-eye btn-icon-prepend"></i> View</button>
                            </a>
                            <a href="{{route('staff-edit' , $staff->id)}}">
                              <button type="button" class="btn-sm btn-inverse-success btn-fw btn-icon-text"><i class="ti-pencil btn-icon-prepend"></i> Edit</button>
                            </a>
                            <button type="button" class="btn-sm btn-inverse-danger btn-fw btn-icon-text deleteUser" value="{{$staff->id}}" data-userid="{{$staff->id}}"><i class="ti-trash btn-icon-prepend"></i> Delete</button>
                          </td>
                        </tr>
                        @empty
                        <tr class="text-center bg-warning" >
                          <td colspan="6">No Data Available</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                     {{$staffs->links()}}
                  </div>
                </div>
              </div>
            </div>
        
</div>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Staff Account</h5>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to Delete this staff account?</h6>
                <form action="{{route('staff-destroy','id')}}" method="POST">
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