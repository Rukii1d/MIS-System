<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Security Service Member - REDA</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"/>

  <style>
    body {
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
    }
    .card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 700px;
      padding: 30px;
    }
    .card-title {
      color: #333;
      font-weight: 700;
    }
    .subtitle {
      font-size: 14px;
      color: #777;
      margin: 0;
    }
    .form-label {
      font-weight: 600;
      color: #444;
    }
    .form-control,
    .form-select {
      border-radius: 10px;
      padding: 10px 15px;
      border: 1px solid #ccc;
    }
    .btn-custom {
      background-color: #2575fc;
      color: white;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: 600;
      transition: 0.3s ease-in-out;
    }
    .btn-custom:hover {
      background-color: #1a5edb;
    }
    .invalid-feedback {
      font-size: 0.9rem;
    }
    img.member-picture {
      max-width: 120px;
      max-height: 120px;
      border-radius: 8px;
      object-fit: cover;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="text-center mb-4">
      <i class="bi bi-shield-lock" style="font-size: 2rem; color: #2575fc;"></i>
      <h3 class="card-title mt-2 mb-1">Edit Security Service Member</h3>
      <p class="subtitle">(REDA Security Service)</p>
    </div>

    <div class="d-flex justify-content-end p-0 mt-3">
      <a href="{{ route('redasecurityservicemembers.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('redasecurityservicemembers.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="etf_no" class="form-label">ETF NO.</label>
        <input type="text" class="form-control @error('etf_no') is-invalid @enderror" id="etf_no" name="etf_no" value="{{ old('etf_no', $member->etf_no) }}" required>
        @error('etf_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="fullname" class="form-label">Fullname</label>
        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname', $member->fullname) }}" required>
        @error('fullname') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <!-- Gender select -->
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
          <option value="" disabled {{ old('gender', $member->gender) ? '' : 'selected' }}>Select Gender</option>
          <option value="MALE" {{ old('gender', $member->gender) == 'MALE' ? 'selected' : '' }}>MALE</option>
          <option value="FEMALE" {{ old('gender', $member->gender) == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
        </select>
        @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <!-- Nationality select -->
      <div class="mb-3">
        <label for="nationality" class="form-label">Nationality</label>
        <select class="form-select @error('nationality') is-invalid @enderror" id="nationality" name="nationality" required>
          <option value="" disabled {{ old('nationality', $member->nationality) ? '' : 'selected' }}>Select Nationality</option>
          @php
            $nationalities = ['SINHALA', 'TAMIL', 'ISLAMIC', 'CATHOLIC', 'CHRISTIAN'];
          @endphp
          @foreach($nationalities as $nation)
            <option value="{{ $nation }}" {{ old('nationality', $member->nationality) == $nation ? 'selected' : '' }}>{{ $nation }}</option>
          @endforeach
        </select>
        @error('nationality') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="nic_no" class="form-label">NIC NO</label>
        <input type="text" class="form-control @error('nic_no') is-invalid @enderror" id="nic_no" name="nic_no" value="{{ old('nic_no', $member->nic_no) }}" required>
        @error('nic_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" required>{{ old('address', $member->address) }}</textarea>
        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="workplace" class="form-label">Workplace</label>
        <input type="text" class="form-control @error('workplace') is-invalid @enderror" id="workplace" name="workplace" value="{{ old('workplace', $member->workplace) }}">
        @error('workplace') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="salary_bank_branch_no" class="form-label">Salary Bank & Branch No</label>
        <input type="text" class="form-control @error('salary_bank_branch_no') is-invalid @enderror" id="salary_bank_branch_no" name="salary_bank_branch_no" value="{{ old('salary_bank_branch_no', $member->salary_bank_branch_no) }}">
        @error('salary_bank_branch_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="acc_no" class="form-label">Account No</label>
        <input type="text" class="form-control @error('acc_no') is-invalid @enderror" id="acc_no" name="acc_no" value="{{ old('acc_no', $member->acc_no) }}">
        @error('acc_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', $member->telephone) }}">
        @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="picture" class="form-label">Picture</label>
        @if ($member->picture)
          <div class="mb-2">
            <img src="{{ asset('storage/' . $member->picture) }}" alt="Picture" class="member-picture" />
          </div>
        @endif
        <input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture" accept="image/*">
        @error('picture') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="date_joined" class="form-label">Date Joined</label>
        <input type="date" class="form-control @error('date_joined') is-invalid @enderror" id="date_joined" name="date_joined" value="{{ old('date_joined', $member->date_joined ? \Carbon\Carbon::parse($member->date_joined)->format('Y-m-d') : '') }}">
        @error('date_joined') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="date_resigned" class="form-label">Date of Resignation</label>
        <input type="date" class="form-control @error('date_resigned') is-invalid @enderror" id="date_resigned" name="date_resigned" value="{{ old('date_resigned', $member->date_resigned ? \Carbon\Carbon::parse($member->date_resigned)->format('Y-m-d') : '') }}">
        @error('date_resigned') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="ds_division" class="form-label">DS Division</label>
        <input type="text" class="form-control @error('ds_division') is-invalid @enderror" id="ds_division" name="ds_division" value="{{ old('ds_division', $member->ds_division) }}">
        @error('ds_division') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="gn_division" class="form-label">GN Division</label>
        <input type="text" class="form-control @error('gn_division') is-invalid @enderror" id="gn_division" name="gn_division" value="{{ old('gn_division', $member->gn_division) }}">
        @error('gn_division') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="police_division" class="form-label">Police Division</label>
        <input type="text" class="form-control @error('police_division') is-invalid @enderror" id="police_division" name="police_division" value="{{ old('police_division', $member->police_division) }}">
        @error('police_division') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <!-- Marital Status select -->
      <div class="mb-3">
        <label for="marital_status" class="form-label">Marital Status</label>
        <select class="form-select @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status">
          <option value="" disabled {{ old('marital_status', $member->marital_status) ? '' : 'selected' }}>Select Marital Status</option>
          <option value="UNMARRIED" {{ old('marital_status', $member->marital_status) == 'UNMARRIED' ? 'selected' : '' }}>UNMARRIED</option>
          <option value="MARRIED" {{ old('marital_status', $member->marital_status) == 'MARRIED' ? 'selected' : '' }}>MARRIED</option>
        </select>
        @error('marital_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="spouse_name" class="form-label">Spouse's Name</label>
        <input type="text" class="form-control @error('spouse_name') is-invalid @enderror" id="spouse_name" name="spouse_name" value="{{ old('spouse_name', $member->spouse_name) }}">
        @error('spouse_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="no_of_children" class="form-label">No of Children</label>
        <input type="number" class="form-control @error('no_of_children') is-invalid @enderror" id="no_of_children" name="no_of_children" value="{{ old('no_of_children', $member->no_of_children) }}">
        @error('no_of_children') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="education_qualifications" class="form-label">Education Qualifications</label>
        <textarea class="form-control @error('education_qualifications') is-invalid @enderror" id="education_qualifications" name="education_qualifications" rows="3">{{ old('education_qualifications', $member->education_qualifications) }}</textarea>
        @error('education_qualifications') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="experience" class="form-label">Experience</label>
        <textarea class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" rows="3">{{ old('experience', $member->experience) }}</textarea>
        @error('experience') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="position_category" class="form-label">Position Category</label>
        <select class="form-select @error('position_category') is-invalid @enderror" id="position_category" name="position_category" required>
          <option value="" disabled>Select Position</option>
          <option value="LSO" {{ old('position_category', $member->position_category) == 'LSO' ? 'selected' : '' }}>LSO</option>
          <option value="SO" {{ old('position_category', $member->position_category) == 'SO' ? 'selected' : '' }}>SO</option>
          <option value="OIC" {{ old('position_category', $member->position_category) == 'OIC' ? 'selected' : '' }}>OIC</option>
        </select>
        @error('position_category') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="d-grid gap-2 mt-4">
        <button type="submit" class="btn btn-custom">Update Member</button>
        <a href="{{ route('redasecurityservicemembers.index') }}" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
