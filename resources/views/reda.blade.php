@include('userdash.userheader')

<style>
  /* Card styles with gradients and hover effect */
  .card-tale {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  }
  .card-dark-blue {
    background: linear-gradient(135deg, #283e51 0%, #485563 100%);
  }
  .card-light-blue {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
  }
  .card-light-danger {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
  }

  .card-tale, .card-dark-blue, .card-light-blue, .card-light-danger {
    border-radius: 15px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.25);
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 2rem;
    min-height: 220px;
    color: #fff;
  }

  .card-tale:hover, .card-dark-blue:hover, .card-light-blue:hover, .card-light-danger:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.35);
  }

  .card-body h4 {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 1rem;
  }

  .card-body h4 a {
    color: inherit;
    text-decoration: none;
    display: block;
  }

  .card-body a.text-white {
    display: inline-block;
    padding: 8px 14px;
    border-radius: 8px;
    transition: background-color 0.25s ease;
    font-size: 1.1rem;
  }

  .card-body a.text-white:hover {
    background-color: rgba(255,255,255,0.2);
    text-decoration: none;
  }

  #dropdownMenuDate2 {
    border-radius: 30px;
    font-weight: 600;
    color: #555;
    box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
  }

  @media (max-width: 768px) {
    .card-tale, .card-dark-blue, .card-light-blue, .card-light-danger {
      margin-bottom: 25px;
      min-height: 200px;
    }

    .card-body h4 {
      font-size: 1.75rem;
    }
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <!-- Welcome Header -->
    <div class="row mb-4">
      <div class="col-md-8">
        <h3 class="font-weight-bold">Welcome, {{ $fullname }}</h3>
        <h6 class="font-weight-normal mb-0">All systems are running smoothly....!!</h6>
      </div>
      <div class="col-md-4 d-flex justify-content-end align-items-center">
        <button class="btn btn-sm btn-light bg-white" id="dropdownMenuDate2">
          <i class="mdi mdi-calendar"></i> <span id="date"></span>
        </button>
      </div>
    </div>

    <script>
      const dateElement = document.getElementById("date");
      const today = new Date();
      const options = { day: '2-digit', month: 'short', year: 'numeric' };
      dateElement.textContent = `Today (${today.toLocaleDateString('en-US', options)})`;
    </script>

    <!-- Row 1: Visual Card -->
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card card-tale">
          <div class="card-people mt-auto">
            <img src="{{ asset('Dashboard/images/dashboard/people.svg') }}" alt="people">
          </div>
        </div>
      </div>
    </div>

    <!-- Row 2: Main Sections -->
    <div class="row mt-4">
      <div class="col-md-4 stretch-card">
        <div class="card card-tale text-white">
          <div class="card-body">
            <h4><a href="{{ URL::to('/redaacademy') }}">REDA Academy</a></h4>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card">
        <div class="card card-dark-blue text-white">
          <div class="card-body">
            <h4><a href="{{ URL::to('/redamanpower') }}">REDA Manpower</a></h4>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card">
        <div class="card card-light-blue text-white">
          <div class="card-body">
            <h4><a href="{{ URL::to('/redaenterprise') }}">REDA Enterprise</a></h4>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card mt-4">
        <div class="card card-light-danger text-white">
          <div class="card-body">
            <h4><a href="{{ URL::to('/redaestablishment') }}">REDA Establishment</a></h4>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card mt-4">
        <div class="card card-tale text-white">
          <div class="card-body">
            <h4><a href="{{ URL::to('/finance') }}">REDA Finance</a></h4>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End row -->
  </div> <!-- End content-wrapper -->
</div> <!-- End main-panel -->

@include('userdash.userfooter')
