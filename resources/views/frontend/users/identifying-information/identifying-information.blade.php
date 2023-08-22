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
                  <form class="forms-sample" method="POST" action="{{route('store-identifying-information')}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">I. IDENTIFYING INFORMATION</p>
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="exampleInputName1" placeholder="Last Name" name="user_id" value="{{  Auth::user()->id}}" @error('last_name') is-invalid @enderror> 
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
                      <label for="exampleInputName1">Phone Number</label>
                      <input type="number" class="form-control" id="exampleInputName1"  placeholder="Phone Number" name="phone_number" value="{{ Auth::user()->phone_number}}" @error('phone_number') is-invalid @enderror>
                       @error('phone_number')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Citizenship</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
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
                         <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Street</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Street" name="street" value="{{ old('street')}}">
                        </div>
                        <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Barangay</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                            <select class="form-control form-control-sm" id="exampleInputEmail3"  name="barangay_id" value="{{ old('barangay_id')}}" @error('barangay_id') is-invalid @enderror>
                              <option value="">-- Select Here --</option>
                              @foreach ($barangays as $barangay)
                                 <option value="{{$barangay->id}}">{{$barangay->name}}</option>
                              @endforeach
                           </select>
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">City/Municipality</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Municipality" name="city_municipality" value="Bulan">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Province</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Province" name="province" value="Sorsogon">
                        </div>
                        </div>
                          <div class="form-group">
                      <label for="exampleInputName1">Age</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="number" class="form-control" id="exampleInputName1"  placeholder="Age" name="age" min="60" value="{{ old('age')}}" @error('age') is-invalid @enderror>
                       @error('age')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Gender</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
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
                      <label for="exampleInputName1">Civil Status</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <select class="form-control form-control-sm" id="exampleInputEmail3"  name="civil_status" value="{{ old('civil_status')}}" @error('civil_status') is-invalid @enderror>
                           <option selected value="Single">Single</option>
                           <option value="Married">Married</option>
                           <option value="Widowed">Widowed</option>
                           <option value="Divorced">Divorced</option>
                           <option value="Separated">Separated </option>
                     </select>
                   
                       @error('civil_status')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Religion</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Religion" name="religion" value="{{ old('religion')}}" @error('religion') is-invalid @enderror>
                       @error('religion')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Birthdate (Month/Date/Year)</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="date" class="form-control" id="exampleInputName1"  placeholder="mm/dd/yyyy" name="birthdate" value="{{ old('birthdate')}}" @error('birthdate') is-invalid @enderror >
                       @error('birthdate')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">Birthplace</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Birthplace" name="birthplace" value="{{ old('birthplace')}}" @error('birthplace') is-invalid @enderror>
                       @error('birthplace')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Educational_attainment</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Educational_attainment" name="educational_attainment" value="{{ old('educational_attainment')}}" @error('educational_attainment') is-invalid @enderror>
                       @error('educational_attainment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Living Arrangement</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="living_arrangement" value="{{ old('living_arrangement')}}" @error('living_arrangement') is-invalid @enderror>
                           <option value="Owned">Owned</option>
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

                    <hr class="text-primary mt-5 mb-5" style="height: 3px">
                     <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Afiilation/Group</p>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputName1">Listahanan( please specify household number )</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="listahanan" value="{{ old('listahanan')}}" @error('listahanan') is-invalid @enderror>
                           @error('listahanan')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Pantawid Beneficiary</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="pantawid_beneficiary" value="{{ old('pantawid_beneficiary')}}" @error('pantawid_beneficiary') is-invalid @enderror>
                           @error('pantawid_beneficiary')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleInputName1">Indigenous People</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="indigenous_people" value="{{ old('indigenous_people')}}" @error('indigenous_people') is-invalid @enderror>
                           @error('indigenous_people')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Senior Citizen Organization</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="senior_citizen_organization" value="{{ old('senior_citizen_organization')}}" @error('senior_citizen_organization') is-invalid @enderror>
                           @error('senior_citizen_organization')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleInputName1">Other</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="others" value="{{ old('others')}}" @error('others') is-invalid @enderror>
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
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="osca" value="{{ old('osca')}}" @error('osca') is-invalid @enderror>
                           @error('others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">TIN</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="tin" value="{{ old('tin')}}" @error('tin') is-invalid @enderror>
                           @error('tin')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">GSIS</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="gsis" value="{{ old('gsis')}}" @error('gsis') is-invalid @enderror>
                           @error('gsis')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">SSS</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="sss" value="{{ old('sss')}}" @error('sss') is-invalid @enderror>
                           @error('sss')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Philhealth</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="philhealth" value="{{ old('philhealth')}}" @error('philhealth') is-invalid @enderror>
                           @error('philhealth')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Others</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" name="id_number_others" value="{{ old('id_number_others')}}" @error('id_number_others') is-invalid @enderror>
                           @error('id_number_others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 mt-4">Next</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>

@endsection()
