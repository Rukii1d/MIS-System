<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - REDA MIS System</title>
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

        .login-card {
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

        .login-card h2 {
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

        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
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
    <div class="login-card">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <p>{{ session()->get ('success')}}</p>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                <p>{{ session()->get ('error')}}</p>
            </div>
        @endif
    
        <h2>Login Here</h2>
        <form action="{{ URL::to('loginUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <span class="error-message" id="email-error">Valid email is required</span>
            </div>

            <div class="mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <span class="error-message" id="password-error">Password is required</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="mt-3">
            <p>Don't have an account? <a href="{{ URL::to('register') }}"><br>Register Here</a></p>
        </div>
    </div>

    <script>
        function validateForm() {
            let isValid = true;

            const email = document.getElementById("email");
            const password = document.getElementById("password");

            const emailError = document.getElementById("email-error");
            const passwordError = document.getElementById("password-error");

            emailError.style.display = !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim()) ? "block" : "none";
            passwordError.style.display = password.value.trim() === "" ? "block" : "none";

            isValid = emailError.style.display === "none" && passwordError.style.display === "none";

            return isValid;
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
