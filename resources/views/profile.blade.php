<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY ACCOUNT</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background: url('assets/images/13.png') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-card h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
        }

                .btn {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
        }


        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="register-card">
            @if(session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session()->get ('success')}}</p>
                    </div>
                @endif
        <h2>My Account</h2>
        <img src="{{ asset('uploads/profiles/' . $user->picture) }}" class="mx-auto d-block rounded-circle" width="100" height="100" alt="{{ $user->name }}'s Profile Picture"><h2></h2>
        <form id="registerForm" action="{{ URL::to('updateUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" value="{{ $user->fullname }}">
                <span class="error-message" id="name-error">Full Name is required</span>
            </div>
            
            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}"readonly>
                <span class="error-message" id="email-error">Valid email is required</span>
            </div>

            <div class="col-lg-12">
                <input type= "file" name="file">
            </div>

            <div class="mb-3">
                <input type="text" name="password" value="{{ $user->password }}" id="password" class="form-control" placeholder="Password">
                <span class="error-message" id="password-error">Password is required</span>
            </div>
            
                            <div class="d-flex justify-content-between gap-2">
                    <button type="submit" class="btn btn-primary w-50">UPDATE</button>
                    <a href="/" class="btn btn-success w-50">HOME</a>
                </div>

            </div>


        </form>
    </div>

    <!-- JavaScript Validation -->
    <script>
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            let isValid = true;

            const fullname = document.getElementById("fullname");
            const email = document.getElementById("email");
            const file = document.getElementById("file");
            const password = document.getElementById("password");

            const nameError = document.getElementById("name-error");
            const emailError = document.getElementById("email-error");
            const fileError = document.getElementById("file-error");
            const passwordError = document.getElementById("password-error");

            // Reset error messages
            nameError.style.display = "none";
            emailError.style.display = "none";
            fileError.style.display = "none";
            passwordError.style.display = "none";

            // Check Full Name
            if (fullname.value.trim() === "") {
                nameError.style.display = "block";
                isValid = false;
            }

            // Check Email (Valid format)
            if (email.value.trim() === "" || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
                emailError.style.display = "block";
                isValid = false;
            }

            // Check File Upload
            if (file.files.length === 0) {
                fileError.style.display = "block";
                isValid = false;
            }

            // Check Password
            if (password.value.trim() === "") {
                passwordError.style.display = "block";
                isValid = false;
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
