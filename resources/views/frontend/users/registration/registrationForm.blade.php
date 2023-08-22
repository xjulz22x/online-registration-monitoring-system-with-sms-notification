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
                  <blockquote class="blockquote mt-5 mb-5 bg-warning text-black">
                    <h6>
                        AN KAUPOD PO SADI NA DOKUMENTO:
                    </h6>
                    <p>
                        1. 1x1 na picture.
                    <br>
                        2. Birth Certificate kun wara po, Baptismal, Mirriage Contract basta po may kapanganakan, GSIS at SSS ID Card or Voters ID.
                    <br>
                        3. Pa upload man tabi san E-signature or picture san signature san iyo senior cetizen president.      
                    </p>
                    <p class="text-danger text-uppercase">
                        Mahalaga tabi na e-upload niyo ang mga nasabi na dokumento.
                    </p>
                  </blockquote>
                  <div>
                        <h5 class="mt-5 mb-5"> Personal Information</h6>
                    </div>
                  <form class="forms-sample" method="POST" action="{{route('store-registration')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name"  value="{{ Auth::user()->first_name}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name"  value="{{  Auth::user()->last_name}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Middle Name" name="middle_name"  value="{{  Auth::user()->middle_name}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Place Of Birth</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Place Of Birth" name="place_of_birth" value="{{ old('place_of_birth')}}" @error('place_of_birth') is-invalid @enderror>
                       @error('place_of_birth')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Age</label>
                      <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Age" name="age" value="{{ old('age')}}" @error('age') is-invalid @enderror>
                       @error('age')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Civil Status</label>
                      <select class="form-control" id="exampleInputEmail3"  name="civil_status" value="{{ old('civil_status')}}" @error('civil_status') is-invalid @enderror>
                          <option selected value="0">Married</option>
                          <option value="1">Single</option>
                          <option value="2">Widowed</option>
                      </select>
                       @error('civil_status')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Date of Birth</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Date of Birth" name="date_of_birth" value="{{ old('date_of_birth')}}" @error('date_of_birth') is-invalid @enderror>
                       @error('date_of_birth')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Sex</label>
                      <select class="form-control" id="exampleInputEmail3"  name="sex" value="{{ old('sex')}}" @error('sex') is-invalid @enderror>
                          <option value="0">Male</option>
                          <option value="1">Female</option>
                      </select>
                       @error('sex')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword4">Address</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Address" name="address" value="{{ old('address')}}" @error('address') is-invalid @enderror>
                       @error('address')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Education Attainment</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Education Attainment" name="educational_attainment" value="{{ old('educational_attainment')}}" @error('educational_attainment') is-invalid @enderror>
                       @error('educational_attainment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Other Skills</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Other Skills" name="other_skills" value="{{ old('other_skills')}}" @error('other_skills') is-invalid @enderror>
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
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u1_fullname">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u1_relationship">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u1_age">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u1_status">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u1_occupation">
                        </div>
                        </div>

                        <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">2. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u2_fullname">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u2_relationship">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u2_age">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u2_status">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u2_occupation">
                        </div>
                        </div>

                         <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">3. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u3_fullname">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u3_relationship">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u3_age">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u3_status">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u3_occupation">
                        </div>
                        </div>
                          <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">4. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u4_fullname">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u4_relationship">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u4_age">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u4_status">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u4_occupation">
                        </div>
                        </div>

                          <hr>

                        <div class="row gy-2 gx-4 align-items-center">
                           <div class="col-auto form-group">
                           <h6 for="exampleInputPassword4">5. </h6>
                        </div>
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="u5_fullname">
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="u5_relationship">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="u5_age">
                        </div>
                         <div class="col-xl-2 form-group">
                           <label for="exampleInputPassword4">Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="u5_status">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="u5_occupation">
                        </div>
                        </div>

                        <div>
                           <h5 class="mt-5 mb-5"> Membership to Senior Citizen Association</h6>
                        </div>

                        <div class="form-group">
                           <label for="exampleInputPassword4">Name of Association</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Name of Association" name="name_of_association" value="{{ old('name_of_association')}}" @error('name_of_association') is-invalid @enderror>
                           @error('name_of_association')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword4">Address of Association</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Address of Association" name="address_of_association" value="{{ old('address_of_association')}}" @error('address_of_association') is-invalid @enderror>
                           @error('address_of_association')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword4">Date of Membership</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Date of Membership" name="date_of_membership" value="{{ old('date_of_membership')}}" @error('date_of_membership') is-invalid @enderror>
                           @error('date_of_membership')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword4">Position</label>
                           <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Position" name="position" value="{{ old('position')}}" @error('position') is-invalid @enderror>
                           @error('position')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        </div>
                        <div>
                           <h5 class="mt-5 mb-5"> E-Upload ang mga kaipuhan na dokumento</h6>
                        </div>
                     <div class="form-group">
                      <label>Picture</label>
                      <input type="file" name="sc_picture" class="form-control" accept="image/*">
                      @error('sc_picture')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                        @enderror
                     </div>
                     <div class="form-group">
                      <label>Birth Certificate kun wara po, Baptismal, Mirriage Contract basta po may kapanganakan, GSIS at SSS ID Card or Voters ID</label>
                      <input type="file" name="sc_document" class="form-control" accept="image/*">
                      @error('sc_document')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        
                     </div>
                     <div class="form-group">
                      <label>Picture san signature san iyo senior citizen president or representative</label>
                      <input type="file" name="sc_pres_signature" class="form-control" accept="image/*">
                      @error('sc_pres_signature')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                     </div>
                     <div>
                        <p class="mt-5 mb-5 "> I certify that the above information are true and correct in the best of my knowledge and belief.</p>
                     </div>
                     <div class="form-group">
                      <label>Picture san signature or thumbmark san senior citizen</label>
                      <input type="file" name="sc_signature" class="form-control" accept="image/*">
                      @error('sc_signature')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                     @enderror
                     </div>
                      
                                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()