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
                  <form class="forms-sample" method="POST" action="{{route('store-family-composition')}}" enctype="multipart/form-data">
                    @csrf
                     <div>
                        <p class="mt-3 mb-4" style="font-size: 15.5px; font-weight:500">II. Family Compostion</p>
                    </div>
            <div class="form-group fieldGroup">
                  <div class="input-group">
                    <div class="input-group row-sm-2 mb-5"> 
                          <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>

                      </div>
                    <div class="row">
                        <input type="hidden" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" value="{{Auth::user()->id}}" name="user_id[]">
                    </div>
                    <div class="row gy-2 gx-4 align-items-center">
                        
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="fullname[]">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="relationship[]">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="age[]">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Civil Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="status[]">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="occupation[]">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 mt-4">Next</button>
            </div>
            </form>

                <div class="form-group fieldGroupCopy" style="display: none">
                  <div class="input-group">
                    <input type="hidden" class="form-control form-control" id="autoSizingInput" placeholder="Full Name" value="{{Auth::user()->id}}" name="user_id[]">
                      <div class="row gy-2 gx-2 align-items-center">
                           
                        <div class="col-auto form-group">
                           <label for="exampleInputPassword4">Full Name</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Full Name" name="fullname[]">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Relationship</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Relationship" name="relationship[]">
                        </div>
                        <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Age</label>
                           <input type="number" class="form-control form-control-sm" id="autoSizingInput" placeholder="20" name="age[]">
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Civil Status</label>
                           <select class="form-control form-control-sm" id="exampleInputEmail3"  name="status[]">
                           <option selected value="0">Single</option>
                           <option value="1">Married</option>
                           <option value="2">Widowed</option>
                           </select>
                        </div>
                         <div class="col-sm-2 form-group">
                           <label for="exampleInputPassword4">Occupation</label>
                           <input type="text" class="form-control form-control-sm" id="autoSizingInput" placeholder="Occupation" name="occupation[]">
                        </div>
                        <div class="col-sm-1 form-group">
                            <label for="exampleInputPassword4">Remove</label>
                           <a href="javascript:void(0)" class="btn btn-danger remove"> &times;</a>
                        </div>
                    </div>
                        
                    
                </div>
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
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
</script>
@endsection