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
                           <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                       @forelse($applications as $application)
                        <tr>
                          <td>{{$application->first_name}}</td>
                          <td>{{$application->middle_name}}</td>
                          <td>{{$application->last_name}}</td>
                          <td>{{$application->date_submitted}}</td>
                          <td class="text-danger">Pending</td>
                          <td>
                           
                            <a href="{{route('show-registration-accounts' , $application->id)}}">
                              <button type="button" class="btn-lg btn-inverse-primary"><i class="ti-eye btn-icon-prepend"></i> View</button>
                            </a>

                          </td>
                        </tr>
                       @empty
                        <tr class="text-center bg-warning" >
                          <td colspan="6">No Data Available</td>
                        </tr>
                           
                       @endforelse 
                         
                      
                      </tbody>
                    </table>
                     {{$applications->links()}}
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection()


