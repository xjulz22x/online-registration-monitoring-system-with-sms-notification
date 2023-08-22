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
                  <form class="forms-sample" method="POST" action="{{route('update-assesment' , $pendingUser->id )}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">V. Assesment</p>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Assesment</label>
                      <textarea type="text" class="form-control" id="exampleInputName1" rows="6"  name="assesment" @error('assesment') is-invalid @enderror>{{$pendingUser->assesment->assesment}}</textarea>
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
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_1" value="{{$pendingUser->assesment->authorized_representative_name_1}}">
                        </div>
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_1" value="{{$pendingUser->assesment->authorized_representative_relation_1}}">
                        </div>
                    </div>
                    <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">2. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_2" value="{{$pendingUser->assesment->authorized_representative_name_2}}">
                        </div>
                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_2" value="{{$pendingUser->assesment->authorized_representative_relation_2}}">
                        </div>
                    </div>
                    <div class="row gy-2 gx-4 align-items-center">
            
                        <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">3. Name</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" name="authorized_representative_name_3" value="{{$pendingUser->assesment->authorized_representative_name_3}}">
                        </div>

                         <div class="col-xl-6 form-group">
                           <label for="exampleInputPassword4">
                              Relationship to Beneficiary
                           </label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Relationship" name="authorized_representative_relation_3" value="{{$pendingUser->assesment->authorized_representative_relation_3}}">
                        </div>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Interviewed by: (LGU/CSWD Social Worker)</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="interviewed_by" value="{{$pendingUser->assesment->interviewed_by}}" @error('intervieded_by') is-invalid @enderror>
                       @error('intervieded_by')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div> 
                 
                   
                    <div class="row gy-2 gx-4 align-items-center popup-img">
                        <div class="col-auto form-group">
                           <label>DSWD FO Social Pension Staff (E-Signature)</label>
                           <img class="d-block image" onclick="openModal1()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$pendingUser->assesment->dswd_e_signature)}}" alt="First slide">
                        </div>

                    </div> 
                     <div class="d-flex justify-content-end">
                       <button type="submit" class="btn btn-primary me-2 mt-4">Update</button>
                       <a href="{{route('completed-accounts')}}">
                       <button type="button" class="btn btn-success me-2 mt-4">Done</button>
                       </a>
                
                    
                  </div>
                  </form>
                   <div class="popup-modal" id="myModal1">
                           <span onclick="closeModal1()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$pendingUser->assesment->dswd_e_signature)}}" alt="First slide">

                    </div>
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

<script>
      function openModal1() {
  document.getElementById("myModal1").style.display = "block";
}

function closeModal1() {
  document.getElementById("myModal1").style.display = "none";
}
</script>
@endsection