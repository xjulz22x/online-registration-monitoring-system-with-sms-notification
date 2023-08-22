@extends('layouts.partials.main')
@section('content')

 <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <span class="card-title"> Admin Add New Senior Account</span>
                    <i class="ti-save text-muted"></i>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="POST" action="{{route('store-senior')}}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name" value="{{ old('first_name')}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name" value="{{ old('last_name')}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name')}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Phone Number</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="+639000000001" name="phone_number" value="{{ old('phone_number')}}" @error('phone_number') is-invalid @enderror>
                       @error('phone_number')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email Address" name="email" value="{{ old('email')}}" @error('email') is-invalid @enderror>
                       @error('email')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password" value="{{ old('password')}}" @error('password') is-invalid @enderror>
                       @error('password')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="/completed-accounts">
                    <button class="btn btn-light" type="button">Cancel</button>
                    </a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()