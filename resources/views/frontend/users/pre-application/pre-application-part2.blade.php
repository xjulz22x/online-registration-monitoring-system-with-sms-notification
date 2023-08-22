@extends('layouts.partials.main')
@section('content')

 <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

            @if ($errors->any())
            <div>
                <ul>
                  @foreach ($errors->all() as $error )
                    <li class="text-danger">
                    {{$error}}
                    </li>
                  @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-5">
               <span class="card-title"> Application Form</span>
                    <i class="ti-files text-muted"></i>
            </div>
                  <form class="forms-sample" method="POST" action="{{route('store-application-form')}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">I. Basic Information</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name" value="{{  Auth::user()->last_name}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name" value="{{  Auth::user()->first_name}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Middle Name" name="middle_name" value="{{  Auth::user()->middle_name}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                     </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Citizenship</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Citizenship" name="citizenship" value="{{ old('citizenship')}}" @error('citizenship') is-invalid @enderror>
                       @error('citizenship')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Address</p>
                    </div>
                    
                        <div class="row gy-2 gx-1 align-items-center">
            
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">House Number</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="House Number" name="house_number" value="{{ old('house_number')}}">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Street</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Street" name="street" value="{{ old('street')}}">
                        </div>
                        <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Barangay</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Barangay" name="barangay" value="{{ old('barangay')}}">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">City/Municipality</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Municipality" name="city_municipality" value="{{ old('city_municipality')}}">
                        </div>
                         <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Province</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Province" name="province" value="{{ old('province')}}">
                        </div>
                        </div>
                          <div class="form-group">
                      <label for="exampleInputName1">Age</label>
                      <input type="number" class="form-control" id="exampleInputName1"  placeholder="Age" name="age" value="{{ old('age')}}" @error('age') is-invalid @enderror>
                       @error('age')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Gender</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="gender" value="{{ old('gender')}}" @error('gender') is-invalid @enderror>
                           <option selected value="Male">Male</option>
                           <option value="Female">Female</option>
                           </select>
                       @error('gender')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Civil Status</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Civil Status" name="civil_status" value="{{ old('civil_status')}}" @error('civil_status') is-invalid @enderror>
                       @error('civil_status')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Birthdate (Month/Date/Year)</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="mm/dd/yyyy" name="birthdate" @error('birthdate') is-invalid @enderror>
                       @error('birthdate')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">Birthplace</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Birthplace" name="birthplace" @error('birthplace') is-invalid @enderror>
                       @error('birthplace')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Living Arrangement</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="living_arrangement" @error('living_arrangement') is-invalid @enderror>
                           <option selected value="Owned">Owned</option>
                           <option value="Living Alone">Living Alone</option>
                           <option value="Living With Relatives">Living With Relatives</option>
                           <option value="Rent">Rent</option>
                           </select>
                       @error('living_arrangement')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <hr class="mt-5 text-primary" style="height: 4px">
                    <div>
                        <p class="mt-4 mb-4" style="font-size: 15.5px; font-weight:500">II. Iconomic Status</p>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Pensioner?</label>
                           <select class="form-control form-control-sm" id="pensioner"  name="pensioner" @error('pensioner') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('pensioner')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="hideshow" style="display: none">
                      <label for="exampleInputName1">If Yes, How Much?</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="pensioner_if_yes" @error('pensioner_if_yes') is-invalid @enderror>
                       @error('pensioner_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Source</label>
                           <select class="form-control form-control-sm" id="source"  name="source" @error('pensioner') is-invalid @enderror>
                           <option>Select</option>
                           <option value="GSIS">GSIS</option>
                           <option value="SSS">SSS</option>
                           <option value="AFPSLAI">AFPSLAI</option>
                           <option value="OTHERS">OTHERS</option>
                           </select>
                       @error('pensioner')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="sourceDIV" style="display: none">
                      <label for="exampleInputName1">If Others, Please State?</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="source_others" @error('source_others') is-invalid @enderror>
                       @error('source_others')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Permanent Source of Income?</label>
                           <select class="form-control form-control-sm" id="permanent_source_of_income"  name="permanent_source_of_income" @error('permanent_source_of_income') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="None">None</option>
                           </select>
                       @error('permanent_source_of_income')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group" id="permanentDIV" style="display: none">
                      <label for="exampleInputName1">If Yes, From what source?</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="permanent_source_of_income_if_yes" @error('permanent_source_of_income_if_yes') is-invalid @enderror>
                       @error('permanent_source_of_income_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Regular Support From Family?</label>
                           <select class="form-control form-control-sm" id="regular_support_from_family"  name="regular_support_from_family" @error('regular_support_from_family') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('regular_support_from_family')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Type of Support</p>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Cash (how much and how often)</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="type_of_support_cash" @error('cash') is-invalid @enderror>
                       @error('cash')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">In kind (specify)</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="type_of_support_in_kind" @error('in_kind') is-invalid @enderror>
                       @error('in_kind')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <hr class="mt-5 text-primary" style="height: 4px">
                      <div>
                        <p class="mt-4 mb-4" style="font-size: 15.5px; font-weight:500">III. Health Condition</p>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Has existing illness?</label>
                           <select class="form-control form-control-sm" id="illness"  name="illness" @error('illness') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('permanent_source_of_income')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="illnessDIV" style="display: none">
                      <label for="exampleInputName1">If Yes, please specify</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="illness_if_yes" @error('illnes_if_yes') is-invalid @enderror>
                       @error('illnes_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Hospitalized within the last 6 months?</label>
                           <select class="form-control form-control-sm" id="illness"  name="hospitalized" @error('hospitalized') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('hospitalized')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">With Maintenance?</label>
                           <select class="form-control form-control-sm" id="with_maintenance"  name="with_maintenance" @error('with_maintenance') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('with_maintenance')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="maintenanceDIV" style="display: none">
                      <label for="exampleInputName1">If yes, please specify</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="with_maintenance_if_yes" @error('with_maintenance_if_yes') is-invalid @enderror>
                       @error('with_maintenance_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                     <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Authorized Representatives (In Succession)</p>
                    </div>
                    
                        <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">1. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_1">
                        </div>
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_1">
                        </div>
                        </div>
                                  <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">2. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_2">
                        </div>
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_2">
                        </div>
                        </div>
                                  <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">3. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_3">
                        </div>
                         <input type="hidden" class="form-control" id="date_submitted"  name="date_submitted" value="{{$mytime}}"> 
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_3">
                        </div>
                        </div>
                     @role('staff|admin')
                     <hr class="mt-5 text-primary" style="height: 4px">
                      <div>
                        <p class="mt-3 mb-3 text-danger" style="font-size: 15.5px"> Iblanko lang tabi ang mga masunod kay para po ini sa mga staff nan social workers</p>
                    </div>
                     
                     <div class="form-group" id="illnessDIV">
                        <label for="exampleInputName1">Recieved by</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name="received_by" @error('received_by') is-invalid @enderror>
                        @error('received_by')
                           <p class="badge badge-danger text-danger">
                              {{ $message }}
                           </p>
                        @enderror
                     </div> 
                     <div class="form-group">
                      <label for="exampleInputName1">Assesment</label>
                      <textarea type="text" class="form-control" id="exampleInputName1" rows="6"  name="assesment" @error('assesment') is-invalid @enderror></textarea>
                       @error('assesment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                     <div class="form-group">
                      <label for="exampleInputName1">Interviewed by: (LGU/CSWD Social Worker)</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="intervieded_by" @error('intervieded_by') is-invalid @enderror>
                       @error('intervieded_by')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputName1">DSWD FO Social Pension Staff (E-Signature)</label>
                      <input type="file" class="form-control" id="exampleInputName1"  name="dswd_e_signature" @error('dswd_e_signature') is-invalid @enderror>
                       @error('dswd_e_signature')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                     @endrole()
                     
                    <button type="submit" class="btn btn-primary me-2 mt-4">Confirm</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()
@section('scripts')
<script>
$(document).ready(function(){
    $('#pensioner').on('change', function() {
      var x = document.getElementById("hideshow");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#source').on('change', function() {
      var x = document.getElementById("sourceDIV");
       if (this.value === 'OTHERS'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#permanent_source_of_income').on('change', function() {
      var x = document.getElementById("permanentDIV");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#illness').on('change', function() {
      var x = document.getElementById("illnessDIV");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#with_maintenance').on('change', function() {
      var x = document.getElementById("maintenanceDIV");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
@endsection