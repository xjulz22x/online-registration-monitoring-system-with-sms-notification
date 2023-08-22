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
                         <h1 class="card-title mb-5">Senior Account for Successfull Payouts List</h1>
                  <div class="table-responsive">
                    @include('frontend.admin.payout.filter-barangay')
                    <hr>
                    @include('frontend.admin.payout.filter-month-year')
                    <hr>
                    @include('frontend.admin.payout.search')
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th>Last Name</th>
                             <th>First Name</th>
                            <th>Middle Name</th>
                          <th>Date Released</th>
                          <th>Amount</th>
                          <th>Approved By</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($payouts as $payout)
                         <tr>
                            <td>{{$payout->last_name}}</td>
                          <td>{{$payout->first_name}}</td>
                          <td>{{$payout->middle_name}}</td>
                          
                          <td>{{$payout->created_at->format('M. d, Y')}}</td>
                          <td>{{$payout->amount}}</td>
                          <td>
                            {{$payout->approve_by}}
                          </td>
                        </tr>
                        @empty
                        <tr class="text-center bg-warning" >
                          <td colspan="6">No Data Available</td>
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

