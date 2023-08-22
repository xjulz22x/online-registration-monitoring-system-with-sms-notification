                <form action="{{route('payout-success-search')}}" method="POST">
                    @csrf
                <div class="form-group mt-5 mb-5">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search by Name" aria-label="Recipient's username"  name="search" id="search">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit">Search</button>
                      </div>
                    </div>
                  </div>
                  </form>