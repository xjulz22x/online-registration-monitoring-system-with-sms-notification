@extends('layouts.partials.main')
@section('content')

<div class="content-wrapper">
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payout Fillup Form</h4>
                  <form class="form-sample" method="POST" action="{{route('payout-store')}}">
                    @csrf
                    <p class="card-description" >
                      Personal info
                    </p>
                    <div class="row">
                        <input type="hidden" class="form-control" value="{{$user->user_id}}" name="user_id"/>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Middle Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$user->middle_name}}" name="middle_name"/>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name"/>
                          </div>
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Barangay</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="example-select" name="barangay_id">
                            <option value="">Please select</option>
                             @foreach($barangays as $barangay)
                                <option value="{{ $barangay->id}}" @selected($barangay->id == $user->barangay_id)>{{$barangay->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                      </div>
                    </div>
                     <input type="hidden" class="form-control" placeholder="dd/mm/yyyy" id="months" name="payout_month">
                    <div class="row">
                      
                     <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Amount</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="amount"/>
                          </div>
                        </div>
                        <input type="hidden" class="form-control" placeholder="dd/mm/yyyy" id="demo" name="payout_day">
                              <input type="hidden" class="form-control" placeholder="dd/mm/yyyy" id="demo_year" name="payout_year">
                      </div>
                       <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                            <input type="hidden" class="form-control" value="{{Auth::user()->getFullName()}}" name="approve_by"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end">
                   <button type="submit" class="btn btn-success">Confirm</button>
                   </div>
                  </form>
                </div>
              </div>
            </div>


             <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                         <h1 class="card-title mb-5">Senior Payout History</h1>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Date recived</th>
                          <th>Amount</th>
                          <th>Approved By</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse ($payouts as $payout)
                         <tr>
                          <td>{{$payout->first_name}}</td>
                          <td>{{$payout->middle_name}}</td>
                          <td>{{$payout->last_name}}</td>
                          <td>{{$payout->created_at->format('M. d, Y')}}</td>
                          <td>
                           {{$payout->amount}}
                           
                          </td>
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
             @endsection()
             @section('scripts')
{{-- <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script> --}}

  <script>
 $(function() {
  $('.date-picker').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'MM yy',
    onClose: function(dateText, inst) {



      function isDonePressed() {
        return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
      }

      if (isDonePressed()) {

        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        $(this).datepicker('setDate', new Date(year, month, 1));
        console.log('Done is pressed')

      }



    }
  });
});

  </script>
  {{-- <script>
    const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    const d = new Date();
    var name = month[d.getMonth()];

    var dateObj = new Date();
    var month = dateObj.getUTCMonth() + 1; //months from 1-12
    var day = dateObj.getUTCDate();
    var year = dateObj.getUTCFullYear();

    var newdate = year + "/" + name + "/" + day;
    document.getElementById("dates").value = name;
  </script> --}}
<script>

const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

const d = new Date();
let name = month[d.getMonth()];
document.getElementById("months").value = name;

</script>
<script>
const d1 = new Date();
let day = d1.getDate();
document.getElementById("demo").value = day;
</script>

<script>
const d2 = new Date();
let year = d2.getFullYear();
document.getElementById("demo_year").value = year;
</script>
  @endsection()