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
            <h5 class="my-3">{{Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h5>
            @role('admin')
                 <p class="text-muted mb-1">Administrator</p>     
            @elseif ('staff')
                  <p class="text-muted mb-1">System Staff</p> 
            @else 
                  <p class="text-muted mb-1">User</p> 
            @endrole
            
            <p class="text-muted mb-4">{{Auth::user()->email}}</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{route('edit-profile' , Auth::user()->id)}}">
                 <button type="button" class="btn btn-outline-primary ms-1">Update Profile</button>
              </a>
            </div>
          </div>
        </div>
        {{-- <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul>
          </div>
        </div> --}}
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
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{Auth::user()->address}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Your Latest Post</span>
                </p>
                @foreach ($getPost as $post )
                    <p class="mt-4 mb-1" style="font-size: .77rem;">{{$post->title}}</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
   
        </div>
      </div>
    </div>
  </div>
</section>
</div>



@endsection()