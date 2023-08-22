@extends('layouts.partials.main')
@section('content')
<div class="content-wrapper">
<section style="background-color: #eee;">
  <div class="container py-3">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-0">
          <div class="card-body text-center">
            {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;"> --}}
            <h5 class="my-3">{{Auth::user()->first_name}}</h5>
           
                  <p class="text-muted mb-1">Senior</p> 
        
            
            <p class="text-muted mb-4">{{Auth::user()->email}}</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{route('user-edit-profile' , Auth::user()->id)}}">
                 <button type="button" class="btn btn-outline-primary ms-1">Update Profile</button>
              </a>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->phone_number}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                  @if(Auth::user()->gender == 0)
                  Rather not say
                  @elseif(Auth::user()->gender == 1)
                  Male
                  @else
                  Female
                  @endif
                </p>
              </div>
            </div>
            <hr>
            {{-- <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->address}}</p>
              </div>
            </div> --}}
          </div>
        </div>
       
      </div>
    </div>
  </div>
</section>
</div>



@endsection()