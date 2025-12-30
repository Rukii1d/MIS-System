<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Access - REDA MIS System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --error-color: #e63946;
            --success-color: #2a9d8f;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/13.png') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-color);
        }
        
        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            animation: fadeInUp 0.8s ease-out;
            transition: transform 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo-container {
            margin-bottom: 1.5rem;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
        }
        
        .logo i {
            font-size: 2.5rem;
            color: white;
        }
        
        .login-card h2 {
            color: var(--primary-color);
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        .login-card p {
            color: #666;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #444;
        }
        
        .input-group {
            position: relative;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 16px;
            border: 2px solid #e1e5eb;
            transition: all 0.3s;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #777;
            cursor: pointer;
        }
        
        .btn-login {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 14px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
            margin-top: 0.5rem;
        }
        
        .btn-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert {
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .alert-danger {
            background-color: rgba(230, 57, 70, 0.1);
            border: 1px solid var(--error-color);
            color: var(--error-color);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }
        
        .password-strength {
            height: 5px;
            margin-top: 0.5rem;
            border-radius: 5px;
            background: #e1e5eb;
            overflow: hidden;
        }
        
        .strength-meter {
            height: 100%;
            width: 0;
            border-radius: 5px;
            transition: width 0.3s, background 0.3s;
        }
        
        .footer {
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #777;
        }
        
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            .logo i {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <div class="logo">
                    <i class="fas fa-lock"></i>
                </div>
                <h2>Secure Access Portal</h2>
                <p>Enter your password to access the REDA MIS System</p>
            </div>

            @if(session()->has('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i>
                <span>{{ session()->get('error') }}</span>
            </div>
            @endif

            <form action="{{ URL::to('loginUser') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" 
                               placeholder="Enter your secure password" required>
                        <button type="button" class="password-toggle" id="passwordToggle">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-meter" id="strengthMeter"></div>
                    </div>
                    <div class="error-message" id="passwordError">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        <span>Please enter a valid password</span>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="loginButton">
                    <i class="fas fa-sign-in-alt me-2"></i>Access System
                </button>
            </form>

            <div class="footer">
                <p>Ensure you're on a secure network before logging in</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            const passwordError = document.getElementById('passwordError');
            const strengthMeter = document.getElementById('strengthMeter');
            const loginForm = document.getElementById('loginForm');
            
            // Toggle password visibility
            passwordToggle.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordToggle.innerHTML = '<i class="far fa-eye-slash"></i>';
                } else {
                    passwordInput.type = 'password';
                    passwordToggle.innerHTML = '<i class="far fa-eye"></i>';
                }
            });
            
            // Simple password strength indicator
            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                let strength = 0;
                
                if (password.length > 0) {
                    if (password.length >= 8) strength += 30;
                    if (/[A-Z]/.test(password)) strength += 30;
                    if (/[0-9]/.test(password)) strength += 20;
                    if (/[^A-Za-z0-9]/.test(password)) strength += 20;
                    
                    strengthMeter.style.width = Math.min(strength, 100) + '%';
                    
                    if (strength < 40) {
                        strengthMeter.style.background = '#e63946';
                    } else if (strength < 70) {
                        strengthMeter.style.background = '#f4a261';
                    } else {
                        strengthMeter.style.background = '#2a9d8f';
                    }
                } else {
                    strengthMeter.style.width = '0';
                }
            });
            
            // Form validation
            loginForm.addEventListener('submit', function(e) {
                if (passwordInput.value.trim() === '') {
                    e.preventDefault();
                    passwordError.style.display = 'block';
                    passwordInput.style.borderColor = 'var(--error-color)';
                }
            });
            
            // Clear error when typing
            passwordInput.addEventListener('input', function() {
                if (passwordInput.value.trim() !== '') {
                    passwordError.style.display = 'none';
                    passwordInput.style.borderColor = '#e1e5eb';
                }
            });
        });
    </script>
</body>

</html>