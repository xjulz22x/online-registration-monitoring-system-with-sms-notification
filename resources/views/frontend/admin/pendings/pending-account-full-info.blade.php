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
                  <form class="forms-sample" method="POST" action="{{route('store-identifying-information')}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">I. IDENTIFYING INFORMATION</p>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" name="last_name" value="{{  $pendingUser->last_name}}" @error('last_name') is-invalid @enderror>
                       @error('last_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror

                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name" value="{{  $pendingUser->first_name}}" @error('first_name') is-invalid @enderror>
                       @error('first_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Middle Name</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Middle Name" name="middle_name" value="{{  $pendingUser->middle_name}}" @error('middle_name') is-invalid @enderror>
                       @error('middle_name')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                     </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Citizenship</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Citizenship" name="citizenship" value="{{ old('citizenship' , $pendingUser->identifying->citizenship)}}" @error('citizenship') is-invalid @enderror>
                       @error('citizenship')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Address</p>
                    </div>
                    
                        <div class="row gy-2 gx-1 align-items-center">
            
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">House Number</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="House Number" name="house_number" value="{{ old('house_number' , $pendingUser->identifying->house_number)}}">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Street</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Street" name="street" value="{{ old('street' , $pendingUser->identifying->street)}}">
                        </div>
                        <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Barangay</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Barangay" name="barangay" value="{{ old('barangay' , $pendingUser->identifying->barangay)}}">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">City/Municipality</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Municipality" name="city_municipality" value="{{ old('city_municipality' , $pendingUser->identifying->city_municipality)}}">
                        </div>
                         <div class="col-sm-3 form-group">
                           <label for="exampleInputPassword4">Province</label>
                           <input type="text" class="form-control form-control" id="autoSizingInput" placeholder="Province" name="province" value="{{ old('province' , $pendingUser->identifying->province)}}">
                        </div>
                        </div>
                          <div class="form-group">
                      <label for="exampleInputName1">Age</label>
                      <input type="number" class="form-control" id="exampleInputName1"  placeholder="Age" name="age" value="{{ old('age' , $pendingUser->identifying->age)}}" @error('age') is-invalid @enderror>
                       @error('age')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Gender</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="gender" value="{{ old('gender' , $pendingUser->identifying->gender)}}" @error('gender') is-invalid @enderror>
                            @if ($pendingUser->identifying->gender == 'Male')
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                            @else
                                <option value="Male">Male</option>
                                <option selected value="Female">Female</option>
                            @endif
                           
                           </select>
                       @error('gender')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Civil Status</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Civil Status" name="civil_status" value="{{ old('civil_status' , $pendingUser->identifying->civil_status)}}" @error('civil_status') is-invalid @enderror>
                       @error('civil_status')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Religion</label>
                      <input type="text" class="form-control" id="exampleInputName1"  placeholder="Religion" name="religion" value="{{ old('religion', $pendingUser->identifying->religion)}}" @error('religion') is-invalid @enderror>
                       @error('religion')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    
                      <div class="form-group">
                      <label for="exampleInputName1">Birthdate (Month/Date/Year)</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('birthdate', $pendingUser->identifying->birthdate)}}"  placeholder="mm/dd/yyyy" name="birthdate" @error('birthdate') is-invalid @enderror>
                       @error('birthdate')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                   
                      <div class="form-group">
                      <label for="exampleInputName1">Birthplace</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('birthplace', $pendingUser->identifying->birthplace)}}" placeholder="Birthplace" name="birthplace" @error('birthplace') is-invalid @enderror>
                       @error('birthplace')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                      <div class="form-group">
                      <label for="exampleInputName1">Educational_attainment</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('educational_attainment', $pendingUser->identifying->educational_attainment)}}"  placeholder="Educational_attainment" name="educational_attainment" @error('educational_attainment') is-invalid @enderror>
                       @error('educational_attainment')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Living Arrangement</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3" value="{{ old('living_arrangement', $pendingUser->identifying->living_arrangement)}}"  name="living_arrangement" @error('living_arrangement') is-invalid @enderror>
                            @if ($pendingUser->identifying->living_arrangement == 'Owned')
                                <option selected value="Owned">Owned</option>
                                <option value="Living Alone">Living Alone</option>
                                <option value="Living With Relatives">Living With Relatives</option>
                                <option value="Rent">Rent</option>
                            @elseif ($pendingUser->identifying->living_arrangement == 'Living Alone')
                                <option value="Owned">Owned</option>
                                <option selected value="Living Alone">Living Alone</option>
                                <option value="Living With Relatives">Living With Relatives</option>
                                <option value="Rent">Rent</option>
                            @elseif ($pendingUser->identifying->living_arrangement == 'Living With Relatives')
                                <option value="Owned">Owned</option>
                                <option value="Living Alone">Living Alone</option>
                                <option selected value="Living With Relatives">Living With Relatives</option>
                                <option value="Rent">Rent</option>
                            @else
                                <option value="Owned">Owned</option>
                                <option value="Living Alone">Living Alone</option>
                                <option value="Living With Relatives">Living With Relatives</option>
                                <option selected value="Rent">Rent</option>
                            @endif
                           </select>
                       @error('living_arrangement')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>

                    <hr class="text-primary mt-5 mb-5" style="height: 3px">
                     <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Afiilation/Group</p>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputName1">Listahanan( please specify household number )</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('listahanan', $pendingUser->identifying->listahanan)}}"  placeholder="" name="listahanan" @error('listahanan') is-invalid @enderror>
                           @error('listahanan')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Pantawid Beneficiary</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" value="{{ old('pantawid_beneficiary', $pendingUser->identifying->pantawid_beneficiary)}}"  name="pantawid_beneficiary" @error('pantawid_beneficiary') is-invalid @enderror>
                           @error('pantawid_beneficiary')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleInputName1">Indigenous People</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('indigenous_people', $pendingUser->identifying->indigenous_people)}}"  placeholder="" name="indigenous_people" @error('indigenous_people') is-invalid @enderror>
                           @error('indigenous_people')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Senior Citizen Organization</label>
                           <input type="text" class="form-control" id="exampleInputName1"  placeholder="" value="{{ old('senior_citizen_organization', $pendingUser->identifying->senior_citizen_organization)}}" name="senior_citizen_organization" @error('senior_citizen_organization') is-invalid @enderror>
                           @error('senior_citizen_organization')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                     <div class="form-group">
                        <label for="exampleInputName1">Other</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('others', $pendingUser->identifying->others)}}"  placeholder="" name="others" @error('others') is-invalid @enderror>
                           @error('others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <hr class="text-primary mt-5 mb-5" style="height: 3px">
                     <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> ID Numbers</p>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">OSCA</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('osca', $pendingUser->identifying->osca)}}"  placeholder="" name="osca" @error('osca') is-invalid @enderror>
                           @error('osca')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">TIN</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('tin', $pendingUser->identifying->tin)}}"  placeholder="" name="tin" @error('tin') is-invalid @enderror>
                           @error('tin')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">GSIS</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('gsis', $pendingUser->identifying->gsis)}}"  placeholder="" name="gsis" @error('gsis') is-invalid @enderror>
                           @error('gsis')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">SSS</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('sss', $pendingUser->identifying->sss)}}"  placeholder="" name="sss" @error('sss') is-invalid @enderror>
                           @error('sss')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Philhealth</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('philhealth', $pendingUser->identifying->philhealth)}}"  placeholder="" name="philhealth" @error('philhealth') is-invalid @enderror>
                           @error('philhealth')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Others</label>
                           <input type="text" class="form-control" id="exampleInputName1" value="{{ old('id_number_others', $pendingUser->identifying->id_number_others)}}" placeholder="" name="id_number_others" @error('id_number_others') is-invalid @enderror>
                           @error('id_number_others')
                              <p class="badge badge-danger text-danger">
                                 {{ $message }}
                              </p>
                           @enderror
                    </div>
                    <hr class="text-warning mt-5 mb-5" style="height: 5px">
                    {{-- family compostion --}}

                           <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">II. Family Compostion</p>
                    </div>
                    <div class="form-group fieldGroup">
                        <div class="input-group">
                            <div class="input-group row-sm-2 mb-3"> 
                              

                            </div>
                            <div class="row">
                               
                            </div>
                            @foreach ($pendingUser->family as $family)
                                 <div class="row gy-2 gx-4 align-items-center">
                                
                                <div class="col-auto form-group">
                                <label for="exampleInputPassword4">Full Name</label>
                                <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="fullname[]" value="{{$family->fullname}}">
                                </div>
                                <div class="col-sm-2 form-group">
                                <label for="exampleInputPassword4">Relationship</label>
                                <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="relationship[]" value="{{$family->relationship}}">
                                </div>
                                <div class="col-sm-2 form-group">
                                <label for="exampleInputPassword4">Age</label>
                                <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="age[]" value="{{$family->age}}">
                                </div>
                                <div class="col-sm-2 form-group">
                                <label for="exampleInputPassword4">Civil Status</label>
                                <select class="form-control form-control-sm" id="exampleInputEmail3"  name="status[]">
                                @if ($family->status == '0')
                                    <option selected value="0">Single</option>
                                    <option value="1">Married</option>
                                    <option value="2">Widowed</option>
                                @elseif ($family->status == '1')
                                    <option  value="0">Single</option>
                                    <option selected value="1">Married</option>
                                    <option value="2">Widowed</option>
                                @else
                                    <option  value="0">Single</option>
                                    <option value="1">Married</option>
                                    <option  selected value="2">Widowed</option>
                                @endif
                                </select>
                                </div>
                                <div class="col-auto form-group">
                                <label for="exampleInputPassword4">Occupation</label>
                                <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="occupation[]" value="{{$family->occupation}}">
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    <hr class="text-warning mt-5 mb-5" style="height: 5px">
                    {{-- economic status --}}

                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">III. Economic Status</p>
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputName1">Pensioner?</label>
                           <select class="form-control form-control-sm" id="pensioner"  name="pensioner" @error('pensioner') is-invalid @enderror>
                            @if ($pendingUser->economic->pensioner == 'Yes')
                                <option selected value="Yes">Yes</option>
                                <option value="No">No</option>
                            @else
                                <option value="Yes">Yes</option>
                                <option selected value="No">No</option>
                            @endif
                           </select>
                       @error('pensioner')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="hideshow" style = "display:{{$pendingUser->economic->pensioner == 'Yes' ? 'block' : 'none'}}">
                      <label for="exampleInputName1">If Yes, How Much?</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('pensioner_if_yes', $pendingUser->economic->pensioner_if_yes)}}"  name="pensioner_if_yes" @error('pensioner_if_yes') is-invalid @enderror>
                       @error('pensioner_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Source</label>
                           <select class="form-control form-control-sm" id="source"  name="source" @error('source') is-invalid @enderror>
                           @if($pendingUser->economic->source == 'GSIS')
                               <option selected value="GSIS">GSIS</option>
                                <option value="SSS">SSS</option>
                                <option value="AFPSLAI">AFPSLAI</option>
                                <option value="OTHERS">OTHERS</option>
                            @elseif($pendingUser->economic->source == 'SSS')
                               <option  value="GSIS">GSIS</option>
                                <option selected value="SSS">SSS</option>
                                <option value="AFPSLAI">AFPSLAI</option>
                                <option value="OTHERS">OTHERS</option>
                            @elseif($pendingUser->economic->source == 'AFPSLAI')
                               <option  value="GSIS">GSIS</option>
                                <option  value="SSS">SSS</option>
                                <option selected value="AFPSLAI">AFPSLAI</option>
                                <option value="OTHERS">OTHERS</option>
                           @else
                               <option  value="GSIS">GSIS</option>
                                <option  value="SSS">SSS</option>
                                <option  value="AFPSLAI">AFPSLAI</option>
                                <option selected value="OTHERS">OTHERS</option>
                           @endif
                          
                           </select>
                       @error('source')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="sourceDIV" style = "display:{{$pendingUser->economic->source == 'OTHERS' ? 'block' : 'none'}}">
                      <label for="exampleInputName1">If Others, Please State?</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('source_others', $pendingUser->economic->source_others)}}"  name="source_others" @error('source_others') is-invalid @enderror>
                       @error('source_others')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Permanent Source of Income?</label>
                           <select class="form-control form-control-sm" id="permanent_source_of_income"  name="permanent_source_of_income" @error('permanent_source_of_income') is-invalid @enderror>
                           @if ($pendingUser->economic->permanent_source_of_income == 'Yes')
                               <option selected value="Yes">Yes</option>
                                <option value="None">None</option>
                           @else
                               <option  value="Yes">Yes</option>
                                <option selected value="None">None</option>
                           @endif
                           
                           </select>
                       @error('permanent_source_of_income')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group" id="permanentDIV" style="display:{{$pendingUser->economic->permanent_source_of_income == 'Yes' ? 'block' : 'none'}}">
                      <label for="exampleInputName1">If Yes, From what source?</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('permanent_source_of_income_if_yes', $pendingUser->economic->permanent_source_of_income_if_yes)}}"  name="permanent_source_of_income_if_yes" @error('permanent_source_of_income_if_yes') is-invalid @enderror>
                       @error('permanent_source_of_income_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Regular Support From Family?</label>
                           <select class="form-control form-control-sm" id="regular_support_from_family"  name="regular_support_from_family" @error('regular_support_from_family') is-invalid @enderror>
                            @if($pendingUser->economic->regular_support_from_family == 'Yes')
                                <option selected value="Yes">Yes</option>
                                <option value="No">No</option>
                            @else
                                <option value="Yes">Yes</option>
                                <option selected value="No">No</option>
                            @endif
                           
                           </select>
                       @error('regular_support_from_family')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div>
                        <p class="mt-3 mb-3" style="font-size: 15.5px"> Type of Support</p>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Cash (how much and how often)</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('type_of_support_cash', $pendingUser->economic->type_of_support_cash)}}"  name="type_of_support_cash" @error('type_of_support_cash') is-invalid @enderror>
                       @error('type_of_support_cash')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">In kind (specify)</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="{{ old('type_of_support_in_kind', $pendingUser->economic->type_of_support_in_kind)}}"  name="type_of_support_in_kind" @error('type_of_support_in_kind') is-invalid @enderror>
                       @error('type_of_support_in_kind')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <hr class="text-warning mt-5 mb-5" style="height: 5px">
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
                    <a href="{{route('pending-assesment' , $pendingUser->id)}}">
                    <button type="button" class="btn btn-success me-2 mt-4">Create Assesment</button>
                    </a>
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