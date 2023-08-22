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
                  <form class="forms-sample" method="POST" action="{{route('update-economic' , $pendingUser->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                     <div>
                     
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

                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2 mt-4">Update</button>
                    <a href="{{route('pending-show-health' , $pendingUser->id)}}">
                    <button type="button" class="btn btn-success me-2 mt-4">Next</button>
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