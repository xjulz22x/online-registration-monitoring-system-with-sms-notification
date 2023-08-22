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
                  <span class="card-title"> Registration From</span>
                    <i class="ti-files text-muted"></i>
                  <div>
                        <h5 class="mt-5 mb-5"> Personal Information</h6>
                    </div>
                  <form class="forms-sample" method="POST" action="{{route('update-registration-accounts' ,$accounts->id )}}" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name"  value="{{ $accounts->first_name}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name"  value="{{  $accounts->last_name}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Middle Name" name="middle_name"  value="{{  $accounts->middle_name}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Place Of Birth</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Place Of Birth" name="place_of_birth" value="{{ old('place_of_birth', $accounts->place_of_birth)}}" @error('place_of_birth') is-invalid @enderror>
                       @error('place_of_birth')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Age</label>
                      <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Age" name="age" value="{{ old('age', $accounts->age)}}" @error('age') is-invalid @enderror>
                       @error('age')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Civil Status</label>
                      <select class="form-control" id="exampleInputEmail3"  name="civil_status" value="{{ old('civil_status' , $accounts->civil_status)}}" @error('civil_status') is-invalid @enderror>
                        @if ($accounts->civil_status == 0)
                            <option selected value="0">Married</option>
                            <option value="1">Single</option>
                            <option value="2">Widowed</option>
                        @elseif ($accounts->civil_status == 1)
                            <option value="0">Married</option>
                            <option selected value="1">Single</option>
                            <option value="2">Widowed</option>
                        @else
                            <option value="0">Married</option>
                            <option value="1">Single</option>
                            <option selected value="2">Widowed</option>
                        @endif
                          
                      </select>
                       @error('civil_status')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Date of Birth</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Date of Birth" name="date_of_birth" value="{{ old('date_of_birth' , $accounts->date_of_birth)}}" @error('date_of_birth') is-invalid @enderror>
                       @error('date_of_birth')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Sex</label>
                      <select class="form-control" id="exampleInputEmail3"  name="sex" value="{{ old('sex' , $accounts->sex)}}" @error('sex') is-invalid @enderror>
                        @if ($accounts->sex == 0)
                            <option selected value="0">Male</option>
                            <option value="1">Female</option>
                        @else
                            <option value="0">Male</option>
                            <option selected value="1">Female</option>
                        @endif
                          
                      </select>
                       @error('sex')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword4">Address</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Address" name="address" value="{{ old('address' ,  $accounts->address)}}" @error('address') is-invalid @enderror>
                       @error('address')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Education Attainment</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Education Attainment" name="educational_attainment" value="{{ old('educational_attainment' ,  $accounts->educational_attainment)}}" @error('educational_attainment') is-invalid @enderror>
                       @error('educational_attainment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Other Skills</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Other Skills" name="other_skills" value="{{ old('other_skills',  $accounts->other_skills)}}" @error('other_skills') is-invalid @enderror>
                       @error('other_skills')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div>
                        <h5 class="mt-5 mb-5"> Family Composition</h6>
                    </div>
                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">1. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u1_fullname" value="{{ old('u1_fullname',  $accounts->u1_fullname)}}">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u1_relationship" value="{{ old('u1_relationship',  $accounts->u1_relationship)}}">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u1_age" value="{{ old('u1_age',  $accounts->u1_age)}}">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u1_status" value="{{ old('u1_status',  $accounts->u1_status)}}">
                           @if ($accounts->u1_status == 0)
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           @elseif ($accounts->u1_status == 1)
                           <option  value="0">Single</option>
                           <option selected value="1">Married</option>
                           <option value="2">Widowed</option>
                           @else
                           <option value="0">Single</option>
                           <option value="1">Married</option>
                           <option selected value="2">Widowed</option>
                           @endif
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u1_occupation" value="{{ old('u1_occupation',  $accounts->u1_occupation)}}">
                        </div>
                        </div>

                        <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">2. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u2_fullname" value="{{ old('u2_fullname',  $accounts->u2_fullname)}}">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u2_relationship" value="{{ old('u2_relationship',  $accounts->u2_relationship)}}">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u2_age" value="{{ old('u2_age',  $accounts->u2_age)}}">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u2_status" value="{{ old('u2_status',  $accounts->u2_status)}}">
                            @if ($accounts->u2_status == 0)
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           @elseif ($accounts->u2_status == 1)
                           <option  value="0">Single</option>
                           <option selected value="1">Married</option>
                           <option value="2">Widowed</option>
                           @else
                           <option value="0">Single</option>
                           <option value="1">Married</option>
                           <option selected value="2">Widowed</option>
                           @endif
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u2_occupation" value="{{ old('u2_occupation',  $accounts->u2_occupation)}}">
                        </div>
                        </div>

                         <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">3. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u3_fullname" value="{{ old('u3_fullname',  $accounts->u3_fullname)}}">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u3_relationship" value="{{ old('u3_relationship',  $accounts->u3_relationship)}}">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u3_age" value="{{ old('u3_age',  $accounts->u3_age)}}">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u3_status" value="{{ old('u3_status',  $accounts->u3_status)}}">
                            @if ($accounts->u3_status == 0)
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           @elseif ($accounts->u3_status == 1)
                           <option  value="0">Single</option>
                           <option selected value="1">Married</option>
                           <option value="2">Widowed</option>
                           @else
                           <option value="0">Single</option>
                           <option value="1">Married</option>
                           <option selected value="2">Widowed</option>
                           @endif
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u3_occupation" value="{{ old('u3_occupation',  $accounts->u3_occupation)}}">
                        </div>
                        </div>
                          <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">4. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u4_fullname" value="{{ old('u4_fullname',  $accounts->u4_fullname)}}">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u4_relationship" value="{{ old('u4_relationship',  $accounts->u4_relationship)}}">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u4_age" value="{{ old('u4_age',  $accounts->u4_age)}}">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u4_status" value="{{ old('u4_status',  $accounts->u4_status)}}">
                            @if ($accounts->u4_status == 0)
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           @elseif ($accounts->u4_status == 1)
                           <option  value="0">Single</option>
                           <option selected value="1">Married</option>
                           <option value="2">Widowed</option>
                           @else
                           <option value="0">Single</option>
                           <option value="1">Married</option>
                           <option selected value="2">Widowed</option>
                           @endif
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u4_occupation" value="{{ old('u4_occupation',  $accounts->u4_occupation)}}">
                        </div>
                        </div>

                          <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">5. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u5_fullname" value="{{ old('u5_fullname',  $accounts->u5_fullname)}}">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u5_relationship" value="{{ old('u5_relationship',  $accounts->u5_relationship)}}">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u5_age" value="{{ old('u5_age',  $accounts->u5_age)}}">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u5_status" value="{{ old('u5_status',  $accounts->u5_status)}}">
                            @if ($accounts->u5_status == 0)
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           @elseif ($accounts->u5_status == 1)
                           <option  value="0">Single</option>
                           <option selected value="1">Married</option>
                           <option value="2">Widowed</option>
                           @else
                           <option value="0">Single</option>
                           <option value="1">Married</option>
                           <option selected value="2">Widowed</option>
                           @endif
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u5_occupation" value="{{ old('u5_occupation',  $accounts->u5_occupation)}}">
                        </div>
                        </div>

                        <div>
                           <h5 class="mt-5 mb-5"> Membership to Senior Citizen Association</h6>
                        </div>

                        <div class="form-group">
                           <label for="exampleInputPassword4">Name of Association</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Name of Association" name="name_of_association" value="{{ old('name_of_association' , $accounts->name_of_association)}}" @error('name_of_association') is-invalid @enderror>
                           @error('name_of_association')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword4">Address of Association</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Address of Association" name="address_of_association" value="{{ old('address_of_association' , $accounts->address_of_association)}}" @error('address_of_association') is-invalid @enderror>
                           @error('address_of_association')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword4">Date of Membership</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Date of Membership" name="date_of_membership" value="{{ old('date_of_membership' , $accounts->date_of_membership)}}" @error('date_of_membership') is-invalid @enderror>
                           @error('date_of_membership')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword4">Position</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Position" name="position" value="{{ old('position' , $accounts->position)}}" @error('position') is-invalid @enderror>
                           @error('position')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div>
                           <h5 class="mt-5 mb-5"> Uploaded Documents</h6>
                        </div>

                        <div class="row gy-2 gx-4 align-items-center popup-img">
                        <div class="col-auto form-group">
                           <label>Picture 1x1</label>
                           <img class="d-block image" onclick="openModal1()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$accounts->sc_picture)}}" alt="First slide">
                        </div>
                        <div class="col-auto form-group">
                           <label>Birth Certificate / Others</label>
                           <img class="d-block image" onclick="openModal2()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$accounts->sc_document)}}" alt="First slide">
                        </div>
                         <div class="col-auto form-group">
                           <label>Senior Citizen President or Representative</label>
                           <img class="d-block image" onclick="openModal3()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$accounts->sc_pres_signature)}}" alt="First slide">
                        </div>
                        <div class="col-auto form-group">
                           <label>Senior Citizen Signature</label>
                           <img class="d-block image" onclick="openModal4()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$accounts->sc_signature)}}" alt="First slide">
                        </div>
                        </div>  

                        <div class="popup-modal" id="myModal1">
                           <span onclick="closeModal1()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$accounts->sc_picture)}}" alt="First slide">

                        </div>

                        <div class="popup-modal" id="myModal2">
                           <span onclick="closeModal2()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$accounts->sc_document)}}" alt="First slide">

                        </div>

                        <div class="popup-modal" id="myModal3">
                           <span onclick="closeModal3()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$accounts->sc_pres_signature)}}" alt="First slide">

                        </div>

                        <div class="popup-modal" id="myModal4">
                           <span onclick="closeModal4()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$accounts->sc_signature)}}" alt="First slide">

                        </div>

                    <button type="submit" class="btn btn-success me-2">Confirm Registration</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
 
@endsection()
@section('scripts')
<script>
    function openModal1() {
  document.getElementById("myModal1").style.display = "block";
}

function closeModal1() {
  document.getElementById("myModal1").style.display = "none";
}

    function openModal2() {
  document.getElementById("myModal2").style.display = "block";
}

function closeModal2() {
  document.getElementById("myModal2").style.display = "none";
}

    function openModal3() {
  document.getElementById("myModal3").style.display = "block";
}

function closeModal3() {
  document.getElementById("myModal3").style.display = "none";
}

    function openModal4() {
  document.getElementById("myModal4").style.display = "block";
}

function closeModal4() {
  document.getElementById("myModal4").style.display = "none";
}
</script>
@endsection()