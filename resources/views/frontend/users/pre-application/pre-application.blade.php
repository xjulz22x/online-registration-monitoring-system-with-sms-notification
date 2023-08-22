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
                  <blockquote class="blockquote mt-5 mb-5 bg-warning text-black">
                    <h6>
                        APPLICATION FORM 1
                    </h6>
                    <p>
                        1. 1x1 na picture.
                    <br>
                        2. Birth Certificate kun wara po, Baptismal, Mirriage Contract basta po may kapanganakan, GSIS at SSS ID Card or Voters ID.
                    <br>
                        3. Barangay Indigency.      
                 
                    <br>
                        4. Senior Citizen I.D (BACK TO BACK)      
                    </p>
                    <p class="text-danger text-uppercase">
                        Mahalaga tabi na e-upload niyo ang mga nasabi na dokumento.
                    </p>
                  </blockquote>
                  <div>
                        <h5 class="mt-5 mb-5"> </h6>
                    </div>
                  <form class="forms-sample" method="POST" action="{{route('store-pre-application')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Pangaran san ina san aplikante sa pagkadaraga</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Mothers Maiden Name" name="mothers_maiden_name" @error('mothers_maiden_name') is-invalid @enderror>
                       @error('mothers_maiden_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Pera po and iyo income sa saro kabulan</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="number" class="form-control" id="exampleInputName1" placeholder="Monthly Income" name="monthly_income" @error('monthly_income') is-invalid @enderror>
                       @error('monthly_income')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ilan po kamo na urupod sa sulod san balay</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="number" class="form-control" id="exampleInputName1"  name="total_person_in_the_house" @error('total_person_in_the_house') is-invalid @enderror>
                       @error('total_person_in_the_house')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                        <div>
                           <h5 class="mt-5 mb-5"> E-Upload ang mga kaipuhan na dokumento</h6>
                        </div>
                     <div class="form-group">
                      <label>Picture san senior (1x1)</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="file" name="senior_picture_1x1" class="form-control" accept="image/*">
                      @error('senior_picture_1x1')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                        @enderror
                     </div>
                     <div class="form-group">
                      <label>Barangay Indigency</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="file" name="barangay_indigency" class="form-control" accept="image/*">
                      @error('barangay_indigency')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                        
                     </div>
                     <div class="form-group">
                      <label>Birth Certificate, kun wara po pumili lang tabi sani: Mirriage Contract, Phil Health, Voters I.D and Baptismal</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="file" name="birth_cert_or_others" class="form-control" accept="image/*">
                      @error('birth_cert_or_others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                     </div>
                     
                     <div class="form-group">
                      <label>Sinior Citizen I.D</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="file" name="senior_citizen_id" class="form-control" accept="image/*">
                      @error('senior_citizen_id')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                     @enderror
                     </div>
                      <div class="form-group">
                      <label>Sinior Citizen E-Signature</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="file" name="senior_signature" class="form-control" accept="image/*">
                      @error('senior_signature')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                     @enderror
                     </div>
                      
                                    
                    <button type="submit" class="btn btn-primary me-2">Next</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection()