<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>REDA Security Service Members</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <!-- Print Styles -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .btn, .pagination, nav, footer {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    @include('userdash.userheader')

    <div class="container mt-4">
        <!-- Header and Buttons -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <h3 class="mb-2 mb-md-0">REDA Security Service Members</h3>
            <div class="d-flex gap-2">
                <a href="{{ route('redasecurityservicemembers.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg me-1"></i> Add New
                </a>
                <a href="{{ route('redasecurityservice.index') }}" class="btn btn-danger">
                    <i class="bi bi-arrow-left me-1"></i> Back
                </a>
                <!-- Print Button -->
                <a href="javascript:window.print()" class="btn btn-outline-primary">
                    <i class="bi bi-printer me-1"></i> Print This Page
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Members Table -->
        @if ($records->isEmpty())
            <div class="alert alert-info">No members found.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ETF NO.</th>
                            <th>Fullname</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th>NIC NO</th>
                            <th>Address</th>
                            <th>Workplace</th>
                            <th>Salary Bank & Branch No</th>
                            <th>Account No</th>
                            <th>Telephone</th>
                            <th>Picture</th>
                            <th>Date Joined</th>
                            <th>Date of Resignation</th>
                            <th>DS Division</th>
                            <th>GN Division</th>
                            <th>Police Division</th>
                            <th>Marital Status</th>
                            <th>Spouse's Name</th>
                            <th>No of Children</th>
                            <th>Education Qualifications</th>
                            <th>Experience</th>
                            <th>Position Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $member)
                            <tr>
                                <td>{{ $member->etf_no }}</td>
                                <td>{{ $member->fullname }}</td>
                                <td>{{ $member->gender }}</td>
                                <td>{{ $member->nationality }}</td>
                                <td>{{ $member->nic_no }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->workplace }}</td>
                                <td>{{ $member->salary_bank_branch_no }}</td>
                                <td>{{ $member->acc_no }}</td>
                                <td>{{ $member->telephone }}</td>
                                <td>
                                    @if ($member->picture)
                                        <img src="{{ asset('uploads/members/' . $member->picture) }}" alt="Picture" width="50" height="50" class="rounded">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $member->date_joined ? \Carbon\Carbon::parse($member->date_joined)->format('Y-m-d') : '-' }}</td>
                                <td>{{ $member->date_resigned ? \Carbon\Carbon::parse($member->date_resigned)->format('Y-m-d') : '-' }}</td>
                                <td>{{ $member->ds_division }}</td>
                                <td>{{ $member->gn_division }}</td>
                                <td>{{ $member->police_division }}</td>
                                <td>{{ $member->marital_status }}</td>
                                <td>{{ $member->spouse_name ?? '-' }}</td>
                                <td>{{ $member->no_of_children }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($member->education_qualifications, 30) }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($member->experience, 30) }}</td>
                                <td>{{ $member->position_category }}</td>
                                <td>
                                    <a href="{{ route('redasecurityservicemembers.edit', $member->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('redasecurityservicemembers.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to delete this member?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $records->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    @include('userdash.userfooter')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
