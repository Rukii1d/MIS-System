@include('userdash.userheader')

<style>
  /* Unified Card Style */
  .card-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    color: #fff;
    text-align: center;
    display: flex;
    flex-direction: column;
  }

  .card-custom:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.25);
  }

  .card-custom h4 {
    font-size: 2rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
  }

  .card-custom a.btn {
    background: rgba(255, 255, 255, 0.9);
    color: #764ba2;
    font-weight: 600;
    transition: all 0.25s ease;
  }

  .card-custom a.btn:hover {
    background: #fff;
    color: #667eea;
  }

  /* Ensure all cards same height */
  .col-flex {
    display: flex;
  }

  .card-body.flex-fill {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  /* Centered SVG */
  
  /* Centered GIF with rounded borders */
  .svg-container {
    text-align: center;
    margin-bottom: 2rem;
  }

  .svg-container img {
    max-width: 800px;
    height: auto;
    border-radius: 20px; /* Curved borders */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  @media (max-width: 768px) {
    .card-custom {
      margin-bottom: 20px;
      min-height: 220px;
      padding: 20px;
    }

    .svg-container img {
      max-width: 150px;
    }
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <!-- Header -->
    <div class="row mb-4">
      <div class="col-md-8">
        <h6 class="font-weight-normal mb-0">All systems are running smoothly....!!</h6>
      </div>
      <div class="col-md-4 d-flex justify-content-end">
        <button class="btn btn-sm btn-light bg-white" id="dropdownMenuDate2">
          <i class="mdi mdi-calendar"></i> <span id="date"></span>
        </button>
        <script>
          const dateElement = document.getElementById("date");
          const today = new Date();
          const options = { day: '2-digit', month: 'short', year: 'numeric' };
          dateElement.textContent = `Today (${today.toLocaleDateString('en-US', options)})`;
        </script>
      </div>
    </div>

    <!-- Centered Looping SVG -->
    <div class="svg-container">
      <img src="{{ asset('svg/112.gif') }}" alt="Looping SVG">
    </div>

    <!-- Main Sections: Uniform Cards -->
    <div class="row g-4">
      <div class="col-md-3 col-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>IT Center</h4>
            <a href="{{ url('/redaitcenter') }}" class="btn btn-sm rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>Hotel School</h4>
            <a href="{{ url('/hotelschool') }}" class="btn btn-sm rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>Language Center</h4>
            <a href="{{ url('/redalanguagecenter') }}" class="btn btn-sm rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>Manpower NVQ</h4>
            <a href="{{ url('/redamanpowernvq') }}" class="btn btn-sm rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@include('userdash.userfooter')
