<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/Logo%20AORTA%20(2).png">
    <title>Daftar - AORTA Malang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       <link rel="stylesheet" href="css/general.css">
     <style>
        /* CSS INTERNAL KHUSUS REGISTER PAGE */
        :root {
            --primary: #154069;
            --accent: #fcd1ad;
            --light: #f1faee;
            --dark: #1d3557;
            --text: #333333;
            --secondary: #1A9AA9;
            --text-light: #7f8c8d;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --border-radius: 12px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        body {
            background-color: #f9f9f9;
            color: var(--text);
            line-height: 1.6;
        }
        
        /* HEADER SECTION - NAVBAR DIPISAH */
        header {
            background: linear-gradient(135deg, rgba(21, 64, 105, 0.9) 0%, rgba(26, 154, 169, 0.9) 100%), 
                        url('img/Peka%202.JPG');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 2rem 0;
            text-align: left;
            position: relative;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        /* NAVBAR - DIPISAH DARI HEADER CONTENT */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 0.8rem 2rem;
            margin: 0 auto 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: 1200px;
            position: sticky;
            top: 20px;
            z-index: 1000;
            transition: all 0.3s ease;
            width: 90%;
        }

        /* Kontainer untuk navbar agar tetap di tengah */
        .nav-container {
            width: 100%;
            display: flex;
            justify-content: center;
            position: relative;
            z-index: 10;
        }

        /* Konten header utama (teks + bingkai) */
        .header-main-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1;
            margin: 0 auto;
        }

        /* Header Text Container - Diposisikan di Kiri */
        .hero-text-container {
            text-align: left;
            z-index: 3;
            flex: 1;
            margin-left: 20px;
            animation: fadeInUp 1s ease-out;
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

        /* TAGLINE */
        .tagline {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            margin: 0 0 1.5rem 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            text-align: left;
            line-height: 1.2;
            background: linear-gradient(to right, #ffffff, #e0f7fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            max-width: 600px;
        }

        .tagline-sub {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 500px;
            text-align: left;
        }

        /* TOMBOL CTA */
        .learn-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--secondary), #00bcd4);
            color: white;
            padding: 18px 35px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(26, 154, 169, 0.3);
            text-align: left;
        }
        
        .learn-more-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(26, 154, 169, 0.4);
            background: linear-gradient(135deg, #00bcd4, var(--secondary));
        }
        
        .learn-more-btn i {
            transition: transform 0.3s ease;
        }
        
        .learn-more-btn:hover i {
            transform: translateX(5px);
        }
        
        /* Bingkai Persegi di Kanan */
        .header-frame {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .frame-container {
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        
        .frame-container::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            animation: shine 3s infinite;
        }
        
        @keyframes shine {
            100% {
                transform: translateX(100%);
            }
        }
        
        .frame-container img {
            width: 90%;
            height: 90%;
            border-radius: 10px;
            object-fit: cover;
        }
        
        /* Main Content Styles */
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        section {
            margin-bottom: 3rem;
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        h2 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--accent);
            font-size: 1.5rem;
        }
        
        h3 {
            color: var(--dark);
            margin: 1.5rem 0 1rem;
        }
        
        p {
            margin-bottom: 1rem;
        }
        
        /* USER GUIDE SECTION */
        .guide-section {
            padding: 80px 20px;
            background: white;
            position: relative;
            margin: 3rem auto;
            max-width: 1200px;
        }
        
        .guide-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .guide-steps {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .guide-step {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            border: 2px solid transparent;
            overflow: hidden;
        }
        
        .guide-step:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--secondary);
        }
        
        .step-number {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(42, 75, 124, 0.3);
        }
        
        .step-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--primary);
            transition: var(--transition);
        }
        
        .guide-step:hover .step-icon {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            transform: scale(1.1) rotate(5deg);
        }
        
        .step-content h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 12px;
            font-weight: 700;
        }
        
        .step-content p {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        /* LOGIN SECTION */
        .login-section {
            padding: 80px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            margin: 3rem auto;
            max-width: 1200px;
            border-radius: 10px;
        }
        
        .login-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #ddd, transparent);
        }
        
        .login-container {
            max-width: 500px;
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            width: 100%;
            margin: 0 auto;
            outline: none !important;
            -webkit-tap-highlight-color: transparent;
        }
        
        /* Remove focus outline from all elements */
        *:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
            border: none;
            padding: 0;
        }
        
        .login-header p {
            color: var(--text-light);
        }
        
        .login-form {
            width: 100%;
        }
        
        /* Remove all focus outlines */
        *:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        
        /* Specifically target form and its children */
        form,
        form *:focus,
        form *:active,
        form *:focus-visible,
        form *:focus-within {
            outline: none !important;
            box-shadow: none !important;
            -webkit-tap-highlight-color: transparent !important;
        }
        
        /* For WebKit browsers */
        @media (-webkit-min-device-pixel-ratio:0) {
            *:focus {
                outline: none !important;
            }
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
        }
        
        .form-group input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
            background: #f8f9fa;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: var(--secondary);
            background: white;
            box-shadow: 0 0 0 3px rgba(26, 154, 169, 0.1);
        }
        
        .input-icon {
            position: absolute;
            right: 18px;
            top: 48px;
            color: var(--text-light);
            font-size: 1.1rem;
        }
        
        .form-group:focus-within .input-icon {
            color: var(--secondary);
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: var(--secondary);
        }
        
        .forgot-password {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }
        
        .forgot-password:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 8px 25px rgba(42, 75, 124, 0.3);
        }
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(42, 75, 124, 0.4);
            background: linear-gradient(135deg, var(--secondary), var(--primary));
        }
        
        .login-button:active {
            transform: translateY(0);
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
            color: var(--text-light);
        }
        
        .register-link a {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: var(--transition);
        }
        
        .register-link a:hover {
            color: var(--primary);
            text-decoration: underline;
        }
        
        .social-login {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
            text-align: center;
        }
        
        .social-login p {
            margin-bottom: 15px;
            color: var(--text-light);
        }
        
        .social-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .social-button {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid #e0e0e0;
            background: white;
            color: var(--text);
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .social-button:hover {
            transform: translateY(-3px);
            border-color: var(--secondary);
            color: var(--secondary);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* ANIMATIONS */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* RESPONSIVE DESIGN */
        @media (max-width: 992px) {
            .tagline {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .guide-steps {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .header-main-content {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }
            
            .hero-text-container {
                margin-left: 0;
                text-align: center;
                margin-bottom: 40px;
            }
            
            .tagline, .tagline-sub {
                text-align: center;
                margin-left: auto;
                margin-right: auto;
            }
            
            .frame-container {
                width: 350px;
                height: 350px;
            }
        }
        
        @media (max-width: 768px) {
            .tagline {
                font-size: 2rem;
            }
            
            .tagline-sub {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
            
            .guide-steps {
                grid-template-columns: 1fr;
            }
            
            .login-container {
                padding: 30px;
            }
            
            .form-options {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
            
            .navbar {
                width: 95%;
                padding: 0.8rem 1.5rem;
            }
            
            .frame-container {
                width: 300px;
                height: 300px;
            }
        }
        
        @media (max-width: 480px) {
            .tagline {
                font-size: 1.6rem;
            }
            
            .learn-more-btn {
                padding: 15px 25px;
                font-size: 1rem;
            }
            
            .guide-step {
                padding: 25px 15px;
            }
            
            .login-container {
                padding: 20px;
            }
            
            .navbar {
                border-radius: 25px;
                padding: 0.8rem 1rem;
            }
            
            .frame-container {
                width: 250px;
                height: 250px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="/img/Logo AORTA (2).png" alt="AORTA Malang" class="h-16">
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('home') }}" class="text-gray-700 hover:text-blue-600">Beranda</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Masuk</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-50">
        <div class="login-container">
            <div class="login-header">
                <h2>Daftar Akun Baru</h2>
                <p>Bergabunglah dengan komunitas AORTA Malang</p>
            </div>
                
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Error</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

               <form class="login-form" method="POST" action="{{ route('register_2.store') }}">       @csrf

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required autofocus>
                        <div class="input-icon">
                            <i class="far fa-user"></i>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon" value="{{ old('phone') }}" required>
                        <div class="input-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                        <div class="input-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <div class="relative">
                            <textarea name="address" id="address" rows="3" class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan alamat lengkap Anda" required>{{ old('address') }}</textarea>
                            <div class="absolute left-3 top-3 text-gray-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" id="password" name="password" placeholder="Buat kata sandi yang aman" required>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi Anda" required>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">Saya setuju dengan <a href="#" class="text-blue-600 hover:underline">Syarat dan Ketentuan</a> dan <a href="#" class="text-blue-600 hover:underline">Kebijakan Privasi</a></label>
                        </div>
                    </div>

                    <button type="submit" class="login-button">
                        Daftar Sekarang
                    </button>
                    @if (session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Error</p>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <div class="register-link">
                        <span>Sudah punya akun?</span>
                        <a href="{{ route('register') }}" class="instagram-link">
                            Masuk disini
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menuToggle');
            const navMenu = document.getElementById('navMenu');
            
            if (menuToggle && navMenu) {
                menuToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('hidden');
                });
            }

            // Add focus styles for better accessibility
            const formInputs = document.querySelectorAll('input, textarea, select');
            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-blue-500', 'ring-opacity-50');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-blue-500', 'ring-opacity-50');
                });
            });
        });
    </script>
</body>
</html>