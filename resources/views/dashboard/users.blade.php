<x-adminheader />

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title mb-4">MIS Users</h3>

            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Picture</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Registration Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>  
                </thead>

                <tbody>
                  @php $i = 1; @endphp
                  @foreach ($users as $item)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>
                      <img src="{{ asset('uploads/profiles/' . $item->picture) }}" width="60" class="rounded" alt="Profile">
                    </td>
                    <td>{{ $item->email }}</td>
                    <td class="font-weight-bold">{{ $item->type }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td class="font-weight-bold">{{ $item->status }}</td>

                    <td>
                        @if($item->status=='Active')
                      <a href="{{ url('changeUserStatus/Blocked/'.$item->id) }}" class="btn btn-sm btn-danger">Block</a>
                        @else
                      <a href="{{ url('changeUserStatus/Active/'.$item->id) }}" class="btn btn-sm btn-success">Un-Block</a>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<x-adminfooter />
