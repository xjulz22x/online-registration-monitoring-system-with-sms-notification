@extends('layouts.partials.main')
@section('content')

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Senior Registration Account Master List</h4>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                         <h1 class="card-title mb-5">Senior Registration Account List</h1>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Middle Name</th>
                          <th>Last Name</th>
                          <th>Date Submitted</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($registrations as $registration)
                         <tr>
                          <td>{{$registration->first_name}}</td>
                          <td>{{$registration->middle_name}}</td>
                          <td>{{$registration->last_name}}</td>
                          <td>{{$registration->created_at->toDateString()}}</td>
                          <td>
                           
                            <a href="{{route('show-registration-accounts' , $registration->id)}}">
                              <button type="button" class="btn-sm btn-inverse-primary btn-fw btn-icon-text"><i class="ti-eye btn-icon-prepend"></i> View</button>
                            </a>

                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                     {{$registrations->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection()


