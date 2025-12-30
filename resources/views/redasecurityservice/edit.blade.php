<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Security Task - REDA</title>

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
      max-width: 650px;
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
  </style>
</head>
<body>

  <div class="card">
    <div class="text-center mb-4">
      <i class="bi bi-shield-lock" style="font-size: 2rem; color: #2575fc;"></i>
      <h3 class="card-title mt-2 mb-1">Edit Security Task</h3>
      <p class="subtitle">(REDA Security Service)</p>
    </div>

    <div class="d-flex justify-content-end p-0 mt-3">
      <a href="{{ route('redasecurityservice.index') }}" class="btn btn-dark">Back</a>
    </div>

    <form action="{{ route('redasecurityservice.update', $redasecurityservice->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="task" class="form-label">Task</label>
        <input type="text" class="form-control @error('task') is-invalid @enderror" id="task" name="task" value="{{ old('task', $redasecurityservice->task) }}" required>
        @error('task') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="due_date" class="form-label">Due Date</label>
        <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date', $redasecurityservice->due_date ? \Carbon\Carbon::parse($redasecurityservice->due_date)->format('Y-m-d') : '') }}" required>
        @error('due_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="complete_date" class="form-label">Complete Date</label>
        <input type="date" class="form-control @error('complete_date') is-invalid @enderror" id="complete_date" name="complete_date" value="{{ old('complete_date', $redasecurityservice->complete_date ? \Carbon\Carbon::parse($redasecurityservice->complete_date)->format('Y-m-d') : '') }}">
        @error('complete_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
          <option value="">-- Select Status --</option>
          <option value="Completed" {{ old('status', $redasecurityservice->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
          <option value="Pending" {{ old('status', $redasecurityservice->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="progress" class="form-label">Progress</label>
        <input type="text" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" value="{{ old('progress', $redasecurityservice->progress) }}">
        @error('progress') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      @if($redasecurityservice->file_path)
        <div class="mb-3">
          <label class="form-label">Current File</label>
          <div>
            <a href="{{ asset($redasecurityservice->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm me-2">
              <i class="bi bi-eye"></i> View
            </a>
            <a href="{{ asset($redasecurityservice->file_path) }}" download class="btn btn-outline-success btn-sm">
              <i class="bi bi-download"></i> Download
            </a>
          </div>
        </div>
      @endif

      <div class="mb-4">
        <label for="file" class="form-label">Upload New File (optional)</label>
        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
        @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-custom">Update Task</button>
        <a href="{{ route('redasecurityservice.index') }}" class="btn btn-danger">Cancel</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
