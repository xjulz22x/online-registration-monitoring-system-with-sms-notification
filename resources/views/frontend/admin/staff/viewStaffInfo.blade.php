@extends('layouts.partials.main')
@section('content')

    <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <span class="card-title mb-4"> View Staff Account</span>
                    <i class="ti-save text-muted"></i>
                  <p class="card-description mb-5">
                  </p>
                    <div class="col-lg-12">
                        
                            <div class="row">
                            <div class="col-sm-2">
                                <p class="mb-0">Full Name:</p>
                            </div>
                            <div class="col-sm-10">
                                <p class="text-muted mb-0 text-uppercase">{{$staff->first_name. ' ' .$staff->last_name. ' '.$staff->middle_name}}</p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-2">
                                <p class="mb-0">Email:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$staff->email}}</p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-2">
                                <p class="mb-0">Phone:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$staff->phone_number}}</p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-2">
                                <p class="mb-0">Gender:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                 @if($staff->gender == 0)
                                 Rather not say
                                @elseif($staff->gender == 1)
                                Male
                                @else
                                Female
                                @endif
                                </p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-2">
                                <p class="mb-0">Address:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{$staff->address}}</p>
                            </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-sm-2">
                                <p class="mb-0">Account Status:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-5">
                                 @if($staff->roles->pluck('name')[0] ?? '' == 'staff')
                                System Staff
                                @endif
                                </p>
                            </div>
                            </div>
                        
                    </div>
                    <a href="/staff-lists">
                        <button class="btn btn-info">Back</button>
                    </a>
                </div>
              </div>
            </div>
          </div>
    </div>

@endsection()


