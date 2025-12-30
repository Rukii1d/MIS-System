<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>REDA Cleaning Service</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    @stack('styles')
</head>
<body>
    @include('userdash.userheader')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="card-title mb-0">REDA Cleaning Service Tasks</h3>
                                  @if(session()->get('type') === 'Admin')
                                <a href="{{ route('redacleaningservice.create') }}" class="btn btn-dark">
                                    <i class="bi bi-plus-lg me-1"></i> Add Task
                                </a>
                            @endif
                            </div>
                               

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i>{{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ Session::get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="table-responsive mt-3">
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Task</th>
                                            <th>Due Date</th>
                                            <th>Complete Date</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Files</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($redacleaningservices as $item)
                                            <tr>
                                                <td>{{ $item->task }}</td>
                                                <td>{{ $item->due_date ? \Carbon\Carbon::parse($item->due_date)->format('Y-m-d') : '-' }}</td>
                                                <td>{{ $item->complete_date ? \Carbon\Carbon::parse($item->complete_date)->format('Y-m-d') : '-' }}</td>
                                                <td>
                                                    @if ($item->status === 'Completed')
                                                        <span class="badge bg-success">Completed</span>
                                                    @elseif ($item->status === 'Pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @else
                                                        <span class="badge bg-secondary">Unknown</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->progress ?? '-' }}</td>
                                                <td>
                                                    @if ($item->file_path)
                                                        <a href="{{ asset($item->file_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary me-1">
                                                            <i class="bi bi-eye"></i> View
                                                        </a>
                                                        <a href="{{ asset($item->file_path) }}" download class="btn btn-sm btn-outline-success">
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    @else
                                                        <span class="text-muted">No File</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('redacleaningservice.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('redacleaningservice.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">No cleaning tasks found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                              <!-- Pagination -->
                            <div class="mt-4 d-flex justify-content-center">
                               {{ $redacleaningservices->links('pagination::bootstrap-5') }}

                            </div>

                            @if(method_exists($redacleaningservices, 'links'))
                                <div class="mt-3">
                                    {{ $redacleaningservices->links() }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('userdash.userfooter')

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
</body>
</html>
