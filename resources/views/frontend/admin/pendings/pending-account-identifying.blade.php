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
               <span class="card-title"> General Intake Sheet</span>
                    <i class="ti-files text-muted"></i>
            </div>
                  <form class="forms-sample" method="POST" action="{{route('update-identifying', $pendingUser->id)}}" enctype="multipart/form-data">
                     @method('PUT')
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">I. IDENTIFYING INFORMATION</p>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name" value="{{  $pendingUser->last_name}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name" value="{{  $pendingUser->first_name}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Middle Name" name="middle_name" value="{{  $pendingUser->middle_name}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                     </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Citizenship</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Citizenship" name="citizenship" value="{{ old('citizenship' , $pendingUser->identifying->citizenship)}}" @error('citizenship') is-invalid @enderror>
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
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="House Number" name="house_number" value="{{ old('house_number' , $pendingUser->identifying->house_number)}}">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Street</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Street" name="street" value="{{ old('street' , $pendingUser->identifying->street)}}">
                        </div>
                        <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Barangay</label>
                           <select class="form-control form-control-line" name="barangay_id">
                           @foreach($barangays as $barangay)
                              <option value="{{$barangay->id}}" {{$barangay->id == $pendingUser->identifying->barangay_id ? 'selected' : ''}}>{{$barangay->name}}</option>
                           @endforeach
                           <select>
                           {{-- <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Barangay" name="barangay_id" value="{{ old('barangay_id' , $pendingUser->identifying->barangay_id)}}"> --}}
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">City/Municipality</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Municipality" name="city_municipality" value="{{ old('city_municipality' , $pendingUser->identifying->city_municipality)}}">
                        </div>
                         <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Province</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Province" name="province" value="{{ old('province' , $pendingUser->identifying->province)}}">
                        </div>
                        </div>
                          <div class="form-group">
                      <label for="exampleInputName1">Age</label>
                      <input type="number" class="form-control" id="exampleInputName1"  placeholder="Age" name="age" value="{{ old('age' , $pendingUser->identifying->age)}}" @error('age') is-invalid @enderror>
                       @error('age')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Gender</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="gender" value="{{ old('gender' , $pendingUser->identifying->gender)}}" @error('gender') is-invalid @enderror>
                            @if ($pendingUser->identifying->gender == 'Male')
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                            @else
                                <option value="Male">Male</option>
                                <option selected value="Female">Female</option>
                            @endif
                           
                           </select>
                       @error('gender')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Civil Status</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Civil Status" name="civil_status" value="{{ old('civil_status' , $pendingUser->identifying->civil_status)}}" @error('civil_status') is-invalid @enderror>
                       @error('civil_status')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Religion</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Religion" name="religion" value="{{ old('religion', $pendingUser->identifying->religion)}}" @error('religion') is-invalid @enderror>
                       @error('religion')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Birthdate (Month/Date/Year)</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('birthdate', $pendingUser->identifying->birthdate)}}"  placeholder="mm/dd/yyyy" name="birthdate" @error('birthdate') is-invalid @enderror>
                       @error('birthdate')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">Birthplace</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('birthplace', $pendingUser->identifying->birthplace)}}" placeholder="Birthplace" name="birthplace" @error('birthplace') is-invalid @enderror>
                       @error('birthplace')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Educational_attainment</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('educational_attainment', $pendingUser->identifying->educational_attainment)}}"  placeholder="Educational_attainment" name="educational_attainment" @error('educational_attainment') is-invalid @enderror>
                       @error('educational_attainment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Living Arrangement</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3" value="{{ old('living_arrangement', $pendingUser->identifying->living_arrangement)}}"  name="living_arrangement" @error('living_arrangement') is-invalid @enderror>
                            @if ($pendingUser->identifying->living_arrangement == 'Owned')
                                <option selected value="Owned">Owned</option>
                                <option value="Living Alone">Living Alone</option>
                                <option value="Living With Relatives">Living With Relatives</option>
                                <option value="Rent">Rent</option>
                            @elseif ($pendingUser->identifying->living_arrangement == 'Living Alone')
                                <option value="Owned">Owned</option>
                                <option selected value="Living Alone">Living Alone</option>
                                <option value="Living With Relatives">Living With Relatives</option>
                                <option value="Rent">Rent</option>
                            @elseif ($pendingUser->identifying->living_arrangement == 'Living With Relatives')
                                <option value="Owned">Owned</option>
                                <option value="Living Alone">Living Alone</option>
                                <option selected value="Living With Relatives">Living With Relatives</option>
                                <option value="Rent">Rent</option>
                            @else
                                <option value="Owned">Owned</option>
                                <option value="Living Alone">Living Alone</option>
                                <option value="Living With Relatives">Living With Relatives</option>
                                <option selected value="Rent">Rent</option>
                            @endif
                           </select>
                       @error('living_arrangement')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>

                    <hr class="text-primary mt-5 mb-5" style="height: 3px">
                     <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Afiilation/Group</p>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputName1">Listahanan( please specify household number )</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('listahanan', $pendingUser->identifying->listahanan)}}"  placeholder="" name="listahanan" @error('listahanan') is-invalid @enderror>
                           @error('listahanan')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Pantawid Beneficiary</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" value="{{ old('pantawid_beneficiary', $pendingUser->identifying->pantawid_beneficiary)}}"  name="pantawid_beneficiary" @error('pantawid_beneficiary') is-invalid @enderror>
                           @error('pantawid_beneficiary')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleInputName1">Indigenous People</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('indigenous_people', $pendingUser->identifying->indigenous_people)}}"  placeholder="" name="indigenous_people" @error('indigenous_people') is-invalid @enderror>
                           @error('indigenous_people')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Senior Citizen Organization</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" value="{{ old('senior_citizen_organization', $pendingUser->identifying->senior_citizen_organization)}}" name="senior_citizen_organization" @error('senior_citizen_organization') is-invalid @enderror>
                           @error('senior_citizen_organization')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleInputName1">Other</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('others', $pendingUser->identifying->others)}}"  placeholder="" name="others" @error('others') is-invalid @enderror>
                           @error('others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <hr class="text-primary mt-5 mb-5" style="height: 3px">
                     <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> ID Numbers</p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">OSCA</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('osca', $pendingUser->identifying->osca)}}"  placeholder="" name="osca" @error('osca') is-invalid @enderror>
                           @error('osca')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">TIN</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('tin', $pendingUser->identifying->tin)}}"  placeholder="" name="tin" @error('tin') is-invalid @enderror>
                           @error('tin')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">GSIS</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('gsis', $pendingUser->identifying->gsis)}}"  placeholder="" name="gsis" @error('gsis') is-invalid @enderror>
                           @error('gsis')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">SSS</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('sss', $pendingUser->identifying->sss)}}"  placeholder="" name="sss" @error('sss') is-invalid @enderror>
                           @error('sss')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Philhealth</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('philhealth', $pendingUser->identifying->philhealth)}}"  placeholder="" name="philhealth" @error('philhealth') is-invalid @enderror>
                           @error('philhealth')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Others</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('id_number_others', $pendingUser->identifying->id_number_others)}}" placeholder="" name="id_number_others" @error('id_number_others') is-invalid @enderror>
                           @error('id_number_others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>
                   
                    
                  <div class="d-flex justify-content-end">
                     <button type="submit" class="btn btn-primary me-2 mt-4">Update</button>
                    <a href="{{route('pending-show-family' , $pendingUser->id)}}">
                    <button type="button" class="btn btn-success me-2 mt-4">Next</button>
                    </a>
                  </div>
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