@extends('layouts.partials.main')
@section('content')
 <div class="content-wrapper">

          <div class="row">

            <div class="col-12 grid-margin stretch-card">
 
              <div class="card">
                <div class="card-body">
                  <span class="card-title"> Update Your Profile</span>
                    <i class="ti-check-box text-muted"></i>
                  <p class="card-description">
                    
                  </p>
            
                  <form class="forms-sample" method="POST" action="{{route('user-update-profile' , $getUserProfile->id )}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name" value="{{ old('first_name' , $getUserProfile->first_name)}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name" value="{{ old('last_name' ,  $getUserProfile->last_name)}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name' ,  $getUserProfile->middle_name)}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email Address" name="email" value="{{ old('email' ,  $getUserProfile->email)}}" @error('email') is-invalid @enderror>
                       @error('email')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Phone Number</label>
                      <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number',$getUserProfile->phone_number)}}" @error('phone_number') is-invalid @enderror>
                       @error('phone_number')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail3">Gender</label>
                      <select class="form-control" id="exampleInputEmail3"  name="gender" value="{{ old('gender' ,  $getUserProfile->gender)}}" @error('gender') is-invalid @enderror>
                        @if ($getUserProfile->gender == 0 )
                          <option selected value="0">Rather not say</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        @elseif ($getUserProfile->gender == 1)
                            <option value="0">Rather not say</option>
                            <option selected value="1">Male</option>
                            <option value="2">Female</option>
                        @else
                            <option value="0">Rather not say</option>
                            <option value="1">Male</option>
                            <option selected value="2">Female</option>
                        @endif
                      </select>
                       @error('gender')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                  
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()