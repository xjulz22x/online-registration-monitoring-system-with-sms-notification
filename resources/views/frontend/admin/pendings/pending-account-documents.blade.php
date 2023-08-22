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
                  <span class="card-title"> Pre-Application Form</span>
                    <i class="ti-files text-muted"></i>
             
                  <div>
                        <h5 class="mt-5 mb-5"> </h6>
                    </div>
                  <form class="forms-sample" method="POST" action="{{route('update-document', $pendingUser->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Pangaran san ina san aplikante sa pagkadaraga</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Mothers Maiden Name" name="mothers_maiden_name" value="{{$pendingUser->preapplication->mothers_maiden_name}}" @error('mothers_maiden_name') is-invalid @enderror>
                       @error('mothers_maiden_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Pera po and iyo income sa saro kabulan</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Monthly Income" name="monthly_income" value="{{$pendingUser->preapplication->monthly_income}}" @error('monthly_income') is-invalid @enderror>
                       @error('monthly_income')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ilan po kamo na urupod sa sulod san balay</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="total_person_in_the_house" value="{{$pendingUser->preapplication->total_person_in_the_house}}" @error('total_person_in_the_house') is-invalid @enderror>
                       @error('total_person_in_the_house')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                        <div>
                           <h5 class="mt-5 mb-5"> Senior Citizen Required Documents</h6>
                        </div>

                    <div class="row gy-2 gx-4 align-items-center popup-img">
                        <div class="col-auto form-group">
                           <label>Picture san senior (1x1)</label>
                           <img class="d-block image" onclick="openModal1()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$pendingUser->preapplication->senior_picture_1x1)}}" alt="First slide">
                        </div>
                        <div class="col-auto form-group">
                           <label>Barangay Indigency</label>
                           <img class="d-block image" onclick="openModal2()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$pendingUser->preapplication->barangay_indigency)}}" alt="First slide">
                        </div>
                        <div class="col-auto form-group">
                           <label>Birth Certificate, Mirriage Contract, Phil Health, Voters I.D and Baptismal</label>
                           <img class="d-block image" onclick="openModal3()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$pendingUser->preapplication->birth_cert_or_others)}}" alt="First slide">
                        </div>
                        <div class="col-auto form-group">
                           <label>Sinior Citizen I.D</label>
                           <img class="d-block image" onclick="openModal4()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$pendingUser->preapplication->senior_citizen_id)}}" alt="First slide">
                        </div>
                        <div class="col-auto form-group">
                           <label>Sinior Citizen E-Signature</label>
                           <img class="d-block image" onclick="openModal4()" style="height: 300px; width: 450px" src="{{asset('/uploads/'.$pendingUser->preapplication->senior_signature)}}" alt="First slide">
                        </div>
                      
                    </div> 
                                 
                     <div class="d-flex justify-content-end">
                     <button type="submit" class="btn btn-primary me-2 mt-4">Update</button>
                    <a href="{{route('pending-show-identifying' , $pendingUser->id)}}">
                    <button type="button" class="btn btn-success me-2 mt-4">Next</button>
                    </a>
                  </div>

                  </form>
                  <div class="popup-modal" id="myModal1">
                           <span onclick="closeModal1()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$pendingUser->preapplication->senior_picture_1x1)}}" alt="First slide">

                    </div>
                    <div class="popup-modal" id="myModal2">
                           <span onclick="closeModal2()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$pendingUser->preapplication->barangay_indigency)}}" alt="First slide">

                    </div>
                    <div class="popup-modal" id="myModal3">
                           <span onclick="closeModal3()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$pendingUser->preapplication->birth_cert_or_others)}}" alt="First slide">

                    </div>
                    <div class="popup-modal" id="myModal4">
                           <span onclick="closeModal4()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$pendingUser->preapplication->senior_citizen_id)}}" alt="First slide">

                    </div>
                    <div class="popup-modal" id="myModal5">
                           <span onclick="closeModal5()">&times;</span>
                           <img class="d-block image" src="{{asset('/uploads/'.$pendingUser->preapplication->senior_signature)}}" alt="First slide">

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()
@section('scripts')
<script>
    function openModal1() {
  document.getElementById("myModal1").style.display = "block";
}

function closeModal1() {
  document.getElementById("myModal1").style.display = "none";
}

    function openModal2() {
  document.getElementById("myModal2").style.display = "block";
}

function closeModal2() {
  document.getElementById("myModal2").style.display = "none";
}

    function openModal3() {
  document.getElementById("myModal3").style.display = "block";
}

function closeModal3() {
  document.getElementById("myModal3").style.display = "none";
}

    function openModal4() {
  document.getElementById("myModal4").style.display = "block";
}

function closeModal4() {
  document.getElementById("myModal4").style.display = "none";
}
    function openModal5() {
  document.getElementById("myModal5").style.display = "block";
}

function closeModal5() {
  document.getElementById("myModal5").style.display = "none";
}
</script>
@endsection()