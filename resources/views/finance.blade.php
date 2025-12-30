@include('userdash.userheader')

<style>
  /* Finance Card Style */
  .finance-card {
    background: linear-gradient(135deg, #43cea2, #185a9d);
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(24, 90, 157, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color: #fff;
    text-align: center;
    padding: 20px;
    min-height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .finance-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.25);
  }

  .finance-card h5 {
    font-weight: 700;
    margin-bottom: 1rem;
  }

  .finance-card a.btn {
    background: rgba(255, 255, 255, 0.9);
    color: #185a9d;
    font-weight: 600;
    padding: 6px 14px;
    font-size: 0.85rem;
    border-radius: 30px;
    transition: all 0.25s ease;
  }

  .finance-card a.btn:hover {
    background: #fff;
    color: #43cea2;
  }

  .finance-row {
    justify-content: center;
    gap: 1.5rem;
    margin-top: 2rem;
  }

  /* GIF Container */
  .svg-container {
    text-align: center;
    margin: 2rem 0;
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
  }
</style>

<div class="main-panel">
  <div class="content-wrapper">
    <!-- Header -->
    <div class="row mb-4">
      <div class="col-md-8">
        <h6 class="font-weight-normal mb-0">Finance Services</h6>
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
      <img src="{{ asset('svg/117.gif') }}" alt="Finance GIF">
    </div>

    <!-- Finance Buttons -->
    <div class="row finance-row">
      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="finance-card flex-fill">
          <h5>Accounts</h5>
          <a href="{{ url::to('/redaaccounts') }}" class="btn">Go</a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="finance-card flex-fill">
          <h5>Procurement</h5>
           <a href="{{ url::to('/redaprocuments') }}" class="btn">Go</a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="finance-card flex-fill">
          <h5>Stores & Asset Mgt</h5>
          <a href="{{ url::to('/redastoresandasset') }}" class="btn">Go</a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-10 d-flex">
        <div class="finance-card flex-fill">
          <h5>Salary</h5>
          <a href="{{ url::to('/redasalary') }}" class="btn">Go</a>
        </div>
      </div>
    </div>
  </div>
</div>

@include('userdash.userfooter')
