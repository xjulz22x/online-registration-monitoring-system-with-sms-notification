     
     <form action="{{route('payout-success-filter-brgy')}}" method="POST">
        @csrf
    
     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Filter By Barangay</label>
                          <div class="col-sm-7">
                            <select class="form-control" id="example-select" name="barangay_id">
                                <option value="">Please select</option>
                                @foreach($barangays as $barangay)
                                    <option value="{{ $barangay->id}}">{{$barangay->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>