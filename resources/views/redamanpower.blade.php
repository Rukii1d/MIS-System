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
    min-height: 180px; /* smaller height */
    padding: 20px; /* smaller padding */
  }

  .card-custom:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.25);
  }

  .card-custom h4 {
    font-size: 1.5rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
  }

  .card-custom a.btn {
    background: rgba(255, 255, 255, 0.9);
    color: #764ba2;
    font-weight: 600;
    transition: all 0.25s ease;
    padding: 6px 14px;
    font-size: 0.85rem;
  }

  .card-custom a.btn:hover {
    background: #fff;
    color: #667eea;
  }

  .card-body.flex-fill {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  /* Centered GIF with curved borders */
  .svg-container {
    text-align: center;
    margin-bottom: 2rem;
  }

  .svg-container img {
    max-width: 800px;
    height: auto;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  @media (max-width: 768px) {
    .svg-container img {
      max-width: 150px;
    }
    .card-custom {
      min-height: 160px;
      padding: 15px;
    }
    .card-custom h4 {
      font-size: 1.25rem;
    }
    .card-custom a.btn {
      padding: 5px 12px;
      font-size: 0.8rem;
    }
  }

  /* Center the cards row */
  .cards-row {
    justify-content: center;
    gap: 1.5rem;
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <!-- Header -->
    <div class="row mb-4">
      <div class="col-md-8">
        <h6 class="font-weight-normal mb-0">Available Services</h6>
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

    <!-- Centered Looping GIF -->
    <div class="svg-container">
      <img src="{{ asset('svg/113.gif') }}" alt="Looping GIF">
    </div>

    <!-- Centered Small Cards with Bootstrap Grid -->
    <div class="row cards-row">
      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>Security Service</h4>
            <a href="{{ url::to('/redasecurityservice') }}" class="btn rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>Cleaning Service</h4>
            <a href="{{ url('/redacleaningservice') }}" class="btn rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="card card-custom flex-fill">
          <div class="card-body flex-fill">
            <h4>Skilled Manpower</h4>
            <a href="{{ url('/redaskilledmanpower') }}" class="btn rounded-pill mt-3">Go</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('userdash.userfooter')
