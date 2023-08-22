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
               <span class="card-title"> Application Form</span>
                    <i class="ti-files text-muted"></i>
            </div>
                  <form class="forms-sample" method="POST" action="{{route('store-health-condition')}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">IV. Health Condition</p>
                    </div>
                    <input type="hidden" class="form-control" id="exampleInputName1"  name="user_id" value="{{Auth::user()->id}}">
                      <div class="form-group">
                      <label for="exampleInputName1">Has existing illness?</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="illness"  name="has_existing_illness" @error('has_existing_illness') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('has_existing_illness')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="illnessDIV" style="display: none">
                      <label for="exampleInputName1">If Yes, please specify</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="has_existing_illness_if_yes" @error('has_existing_illness_if_yes') is-invalid @enderror>
                       @error('has_existing_illness_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Hospitalized within the last 6 months?</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="illness"  name="hospitalized" @error('hospitalized') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('hospitalized')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">With Maintenance?</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="with_maintenance"  name="with_maintenance" @error('with_maintenance') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('with_maintenance')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="maintenanceDIV" style="display: none">
                      <label for="exampleInputName1">If yes, please specify</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="with_maintenance_if_yes" @error('with_maintenance_if_yes') is-invalid @enderror>
                       @error('with_maintenance_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 

                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2 mt-4 mb-4">Confirm</button>
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