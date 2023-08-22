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
                  <form class="forms-sample" method="POST" action="{{route('store-economic-status')}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">III. Economic Status</p>
                    </div>
                     <input type="hidden" class="form-control" id="exampleInputName1" value="{{Auth::user()->id}}" name="user_id" @error('permanent_source_of_income_if_yes') is-invalid @enderror>
                     <div class="form-group">
                      <label for="exampleInputName1">Pensioner?</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="pensioner"  name="pensioner" @error('pensioner') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
                           </select>
                       @error('pensioner')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="hideshow" style="display: none">
                      <label for="exampleInputName1">If Yes, How Much?</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="pensioner_if_yes" @error('pensioner_if_yes') is-invalid @enderror>
                       @error('pensioner_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">Source</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="source"  name="source" @error('source') is-invalid @enderror>
                           <option>Select</option>
                           <option value="GSIS">GSIS</option>
                           <option value="SSS">SSS</option>
                           <option value="AFPSLAI">AFPSLAI</option>
                           <option value="OTHERS">OTHERS</option>
                           <option value="NONE">NONE</option>
                           </select>
                       @error('source')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group" id="sourceDIV" style="display: none">
                      <label for="exampleInputName1">If Others, Please State?</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="source_others" @error('source_others') is-invalid @enderror>
                       @error('source_others')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Permanent Source of Income?</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="permanent_source_of_income"  name="permanent_source_of_income" @error('permanent_source_of_income') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="None">None</option>
                           </select>
                       @error('permanent_source_of_income')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group" id="permanentDIV" style="display: none">
                      <label for="exampleInputName1">If Yes, From what source?</label>
                      <input type="text" class="form-control" id="exampleInputName1"  name="permanent_source_of_income_if_yes" @error('permanent_source_of_income_if_yes') is-invalid @enderror>
                       @error('permanent_source_of_income_if_yes')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Regular Support From Family?</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                           <select class="form-control form-control-sm" id="regular_support_from_family"  name="regular_support_from_family" @error('regular_support_from_family') is-invalid @enderror>
                           <option>Select</option>
                           <option value="Yes">Yes</option>
                           <option value="No">No</option>
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
                      <label for="exampleInputName1">Cash (how much and how often)</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="number" class="form-control" id="exampleInputName1"  name="type_of_support_cash" @error('cash') is-invalid @enderror>
                       @error('cash')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputName1">In kind (specify)</label><span class="text-danger text-sm" style="font-size: 12px"> ( This field is required * )</span>
                      <input type="text" class="form-control" id="exampleInputName1"  name="type_of_support_in_kind" @error('in_kind') is-invalid @enderror>
                       @error('in_kind')
                        <p class="badge badge-danger text-danger">
                           {{ $message }}
                        </p>
                       @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 mt-4">Next</button>
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