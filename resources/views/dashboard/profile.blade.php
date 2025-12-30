<x-adminheader />

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="card shadow rounded-4">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Admin Profile</h3>

            @if(session()->has('success'))
              <div class="alert alert-success text-center mb-4">
                {{ session()->get('success') }}
              </div>
            @endif

            <div class="text-center mb-4">
              <img src="{{ asset('uploads/profiles/' . $user->picture) }}" 
                   class="rounded-circle img-thumbnail" 
                   width="120" height="120" 
                   alt="{{ $user->name }}'s Profile Picture">
            </div>

            <form id="registerForm" action="{{ URL::to('updateUser') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <input type="text" name="fullname" id="fullname" 
                       class="form-control" 
                       placeholder="Full Name" 
                       value="{{ $user->fullname }}">
              </div>

              <div class="mb-3">
                <input type="email" name="email" id="email" 
                       class="form-control" 
                       placeholder="Email" 
                       value="{{ $user->email }}" readonly>
              </div>

              <div class="mb-3">
                <input type="file" name="file" id="file" class="form-control">
              </div>

              <div class="mb-4">
                <input type="text" name="password" id="password" 
                       class="form-control" 
                       placeholder="Password" 
                       value="{{ $user->password }}">
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<x-adminfooter />
