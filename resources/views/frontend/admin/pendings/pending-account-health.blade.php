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
                  <form class="forms-sample" method="POST" action="{{route('update-health', $pendingUser->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                    {{-- health condition --}}

                    <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">IV. Health Condition</p>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Has existing illness?</label>
                           <select class="form-control form-control-sm" id="illness"  name="has_existing_illness" @error('has_existing_illness') is-invalid @enderror>
                           @if ($pendingUser->health->has_existing_illness == 'Yes')
                               <option selected value="Yes">Yes</option>
                                <option value="No">No</option>
                           @else
                               <option value="Yes">Yes</option>
                                <option selected value="No">No</option>
                           @endif
                           </select>
                       @error('has_existing_illness')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="illnessDIV" style="display: {{$pendingUser->health->has_existing_illness == 'Yes' ? 'block' : 'none'}}">
                      <label for="exampleInputName1">If Yes, please specify</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('has_existing_illness_if_yes', $pendingUser->health->has_existing_illness_if_yes)}}"  name="has_existing_illness_if_yes" @error('has_existing_illness_if_yes') is-invalid @enderror>
                       @error('has_existing_illness_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Hospitalized within the last 6 months?</label>
                           <select class="form-control form-control-sm" id="illness"  name="hospitalized" @error('hospitalized') is-invalid @enderror>
                           @if ($pendingUser->health->hospitalized == 'Yes')
                               <option selected value="Yes">Yes</option>
                                <option value="No">No</option>
                           @else
                               <option  value="Yes">Yes</option>
                                <option selected value="No">No</option>
                           @endif
                           
                           </select>
                       @error('hospitalized')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">With Maintenance?</label>
                           <select class="form-control form-control-sm" id="with_maintenance"  name="with_maintenance" @error('with_maintenance') is-invalid @enderror>
                           @if ($pendingUser->health->with_maintenance == 'Yes')
                               <option selected value="Yes">Yes</option>
                                <option value="No">No</option>
                           @else
                               <option  value="Yes">Yes</option>
                                <option selected value="No">No</option>
                           @endif
                           </select>
                       @error('with_maintenance')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="maintenanceDIV" style="display: {{$pendingUser->health->with_maintenance == 'Yes' ? 'block' : 'none'}}">
                      <label for="exampleInputName1">If yes, please specify</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('with_maintenance_if_yes', $pendingUser->health->with_maintenance_if_yes)}}"  name="with_maintenance_if_yes" @error('with_maintenance_if_yes') is-invalid @enderror>
                       @error('with_maintenance_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 

                    
                  <div class="d-flex justify-content-end">
                   
                    @if ($pendingUser->assesment == null)
                      <a href="{{route('pending-assesment' , $pendingUser->id)}}">
                    <button type="button" class="btn btn-success me-2 mt-4">Create Assesment</button>
                    </a>
                    @else
                       <button type="submit" class="btn btn-primary me-2 mt-4">Update</button>
                       <a href="{{route('pending-show-assesment', $pendingUser->id)}}">
                       <button type="button" class="btn btn-success me-2 mt-4">Next</button>
                       </a>
                    @endif
                    
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>

@endsection()
@section('scripts')
<script>
$(document).ready(function(){
    $('#pensioner').on('change', function() {
      var x = document.getElementById("hideshow");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#source').on('change', function() {
      var x = document.getElementById("sourceDIV");
       if (this.value === 'OTHERS'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#permanent_source_of_income').on('change', function() {
      var x = document.getElementById("permanentDIV");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#illness').on('change', function() {
      var x = document.getElementById("illnessDIV");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
<script>
$(document).ready(function(){
    $('#with_maintenance').on('change', function() {
      var x = document.getElementById("maintenanceDIV");
       if (this.value === 'Yes'){
         x.style.display = "block";
    } else {
         x.style.display = "none";
    }
    });
});     
</script>
@endsection