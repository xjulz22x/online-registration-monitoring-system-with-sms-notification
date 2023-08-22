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
          <form action="{{route('payout-senior-search')}}" method="POST">
                    @csrf
                <div class="form-group mt-5 mb-5">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search by Name" aria-label="Recipient's username"  name="searching" id="search">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                      </div>
                    </div>
                  </div>
                  </form>
           <div class="col-lg-12 grid-margin stretch-card">
            
              <div class="card">
                
                <div class="card-body">
                         
              <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                  <h1 class="card-title">Senior Account for Payouts List</h1>
                </div>
                <div>
                  <a href="{{route('payout-list')}}">
                     <button type="button" class="btn btn-primary btn-icon-text">
                          <i class="ti-reload btn-icon-prepend"></i>                                                    
                         Refresh List
                   </button>
                  </a>
                </div>
              </div>
                  </a>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th>Last Name</th>
                             <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Barangay</th>
                          
                          <th>Date Submitted</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($payouts as $payout)
                         <tr>
                            <td>{{$payout->last_name}}</td>
                          <td>{{$payout->first_name}}</td>
                          <td>{{$payout->middle_name}}</td>
                          <td><select class="form-control bg-color-white" id="example-select" name="barangay_id">
                            <option value="">Please select</option>
                             @foreach($barangays as $barangay)
                                <option value="{{ $barangay->id}}" @selected($barangay->id == $payout->barangay_id)>{{$barangay->name}}</option>
                            @endforeach
                        </select></td>
                          <td>{{$payout->created_at->format('M. d, Y')}}</td>
                          <td>
                           
                            <a href="{{route('payout-create' , $payout->id)}}">
                              <button type="button" class="btn-sm btn-inverse-primary btn-fw btn-icon-text"><i class="ti-angle-double-right btn-icon-prepend"></i> Proceed to payout</button>
                            </a>
                          </td>
                        </tr>
                        @empty
                        <tr class="text-center bg-warning" >
                          <td colspan="5">No Data Available</td>
                        </tr>
                       @endforelse
                      </tbody>
                    </table>
                     {{$payouts->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>


<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Decline Senior Account</h5>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to decline this senior account?</h6>
                <form action="{{route('senior-decline','id')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="RestoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Decline Senior Account</h5>
            </div>
            <div class="modal-body">
                <h6>Are you sure you want to decline this senior account?</h6>
                <form action="{{route('senior-decline','id')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Decline</button>
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

