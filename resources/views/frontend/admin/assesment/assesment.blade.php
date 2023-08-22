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
                  <form class="forms-sample" method="POST" action="{{route('create-assesment' , $assesmentForUser->id)}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">V. Assesment</p>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Assesment</label>
                      <textarea type="text" class="form-control" id="exampleInputName1" rows="6"  name="assesment" @error('assesment') is-invalid @enderror></textarea>
                       @error('assesment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                    <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Authorized Representatives (In Succession)</p>
                    </div>
                    
                    <div class="row gy-2 gx-4 align-items-center">
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">1. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_1">
                        </div>
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_1">
                        </div>
                    </div>
                    <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">2. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_2">
                        </div>
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_2">
                        </div>
                    </div>
                    <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">3. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_3">
                        </div>
                         <input type="hidden" class="form-control" id="date_submitted"  name="date_submitted" value="{{$mytime}}"> 
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_3">
                        </div>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Interviewed by: (LGU/CSWD Social Worker)</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="interviewed_by" value="{{Auth::user()->first_name. ' ' . Auth::user()->middle_name. ' ' . Auth::user()->last_name}}" @error('intervieded_by') is-invalid @enderror>
                       @error('intervieded_by')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputName1">DSWD FO Social Pension Staff (E-Signature)</label>
                      <input type="file" class="form-control" id="exampleInputName1"  name="dswd_e_signature" @error('dswd_e_signature') is-invalid @enderror>
                       @error('dswd_e_signature')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary me-2 mt-4">Confirm</button>
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