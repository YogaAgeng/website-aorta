<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/Logo%20AORTA%20(2).png">
    <title>Login - AORTA Malang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap">
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
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
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
<body>
    <!-- Header Section -->
    <header>
        <!-- NAVBAR DI LUAR KONTEN UTAMA -->
        <div class="nav-container">
            <nav class="navbar" id="navbar">
                <div class="nav-logo">
                    <!-- Logo AORTA -->
                    <img src="img/Logo%20AORTA%20(2).png" alt="AORTA Malang Logo" class="logo-img">
                </div>
                
                <!-- Menu Toggle untuk Mobile -->
                <button class="menu-toggle" id="menuToggle">☰</button>
                
                <ul class="nav-menu" id="navMenu">
                     <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/articles') }}" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/project') }}" class="nav-link">Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="nav-link active">Daftar</a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <!-- Konten Utama Header (Teks + Bingkai) -->
        <div class="header-main-content">
            <!-- Header Text Container - Diposisikan di Kiri -->
            <div class="hero-text-container">
                <h1 class="tagline">Bergabung dengan AORTA Malang</h1>
                <p class="tagline-sub">Menjadi bagian dari perubahan positif untuk kesehatan remaja di Malang. Bersama kita bisa belajar, berkembang, dan bertindak untuk masa depan yang lebih sehat.</p>
                <a href="#guide" class="learn-more-btn">
                    <span>Mulai Bergabung</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Bingkai Persegi di Kanan -->
            <div class="header-frame animate-on-scroll">
                <div class="frame-container">
                    <img src="img/Logo%20AORTA%20(2).png" alt="AORTA Malang Logo">
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- User Guide Section -->
        <section id="guide" class="guide-section animate-on-scroll">
            <div class="section-header">
                <h2 class="section-title">Cara Bergabung</h2>
                <p class="section-subtitle">Ikuti 3 langkah mudah untuk menjadi bagian dari AORTA Malang</p>
            </div>
            
            <div class="guide-steps">
                <!-- Step 1 -->
                <div class="guide-step">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="step-content">
                        <h3>Follow Instagram Kami</h3>
                        <p>Follow Instagram resmi AORTA Malang untuk mendapatkan informasi terbaru tentang open recruitment dan kegiatan kami.</p>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="guide-step">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="step-content">
                        <h3>Tunggu Open Batch</h3>
                        <p>Pantau pengumuman open batch yang akan diposting di Instagram kami. Biasanya dilakukan setiap 6 bulan sekali.</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="guide-step">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="step-content">
                        <h3>Hubungi Admin</h3>
                        <p>Setelah open batch dibuka, hubungi admin melalui Instagram untuk mendapatkan formulir pendaftaran dan informasi selanjutnya.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Login Section -->
        <section class="login-section animate-on-scroll">
            <div class="login-container">
                <div class="login-header">
                    <h2>Login Anggota</h2>
                    <p>Masuk ke akun Anda untuk mengakses dashboard anggota</p>
                </div>
                
                <form class="login-form" id="loginForm">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="masukkan email anda" required>
                        <div class="input-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="masukkan password anda" required>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember">
                            <label for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-password">Lupa password?</a>
                    </div>
                    
                    <button type="submit" class="login-button">Login</button>
                    
                    <div class="register-link">
                        <span>Belum punya akun?</span>
                        <a href="https://www.instagram.com/aortacommunitymalang?igsh=MW9yZDA5M253ZXZzZw%3D%3D&utm_source=qr" 
                           class="instagram-link" 
                           target="_blank">
                           Daftar di sini
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content footer-top-border">
            <!-- Sisi Kiri: Copyright -->
            <div class="copyright">2025 - AORTA MALANG</div>
            
            <!-- Sisi Kanan: Social Media -->
            <div class="social-media">
                <a href="https://www.tiktok.com/@aorta.malang?_t=ZS-90fsbBahod6&_r=1" class="social-icon" title="TikTok" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://www.instagram.com/aortacommunitymalang?igsh=MW9yZDA5M253ZXZzZw%3D%3D&utm_source=qr" class="social-icon" title="Instagram" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=aortamalang@gmail.com" class="social-icon" title="Gmail" target="_blank" rel="noopener noreferrer">
                    <i class="far fa-envelope"></i>
                </a>
                <a href="https://youtube.com/@aortamalang?si=CszVRgovv8Uhun79" class="social-icon" title="YouTube" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript untuk interaktivitas
        document.addEventListener('DOMContentLoaded', function() {
            console.log('JavaScript loaded successfully');
            
            // Sticky Navigation
            const navbar = document.getElementById('navbar');
            const header = document.querySelector('header');
            
            if (navbar && header) {
                const headerHeight = header.offsetHeight;
                
                // Function to handle scroll
                function handleScroll() {
                    if (window.scrollY > headerHeight - 100) {
                        navbar.classList.add('sticky');
                    } else {
                        navbar.classList.remove('sticky');
                    }
                }
                
                // Listen for scroll events
                window.addEventListener('scroll', handleScroll);
                
                // Trigger once to check initial state
                handleScroll();
            }
            
            // Smooth scroll untuk tombol CTA
            const learnMoreBtn = document.querySelector('.learn-more-btn');
            if (learnMoreBtn) {
                learnMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector('#guide');
                    if (target) {
                        const navbar = document.querySelector('.navbar');
                        const offset = navbar && navbar.classList.contains('sticky') ? 80 : 20;
                        window.scrollTo({
                            top: target.offsetTop - offset,
                            behavior: 'smooth'
                        });
                    }
                });
            }
            
            // Mobile menu toggle
            const menuToggle = document.getElementById('menuToggle');
            const navMenu = document.getElementById('navMenu');
            
            if (menuToggle && navMenu) {
                menuToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                });
                
                // Close mobile menu when clicking on a link
                const navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (navMenu.classList.contains('active')) {
                            navMenu.classList.remove('active');
                        }
                    });
                });
            }
            
            // Login form handling
            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;
                    
                    // Simple validation
                    if (!email || !password) {
                        alert('Harap isi semua field!');
                        return;
                    }
                    
                    // Simulate login process
                    const loginButton = loginForm.querySelector('.login-button');
                    const originalText = loginButton.innerHTML;
                    
                    loginButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
                    loginButton.disabled = true;
                    
                    // Simulate API call
                    setTimeout(() => {
                        alert('Login berhasil! (Ini hanya simulasi)');
                        loginButton.innerHTML = originalText;
                        loginButton.disabled = false;
                        
                        // Clear form
                        loginForm.reset();
                    }, 1500);
                });
            }
            
            // Forgot password link
            const forgotPassword = document.querySelector('.forgot-password');
            if (forgotPassword) {
                forgotPassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert('Fitur reset password akan segera hadir!');
                });
            }
            
            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);
            
            // Observe all elements with animate-on-scroll class
            document.querySelectorAll('.animate-on-scroll').forEach(element => {
                observer.observe(element);
            });
            
            // Add some interactive effects to guide steps
            const guideSteps = document.querySelectorAll('.guide-step');
            guideSteps.forEach(step => {
                step.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('.step-icon i');
                    if (icon) {
                        icon.style.transform = 'scale(1.2) rotate(10deg)';
                    }
                });
                
                step.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('.step-icon i');
                    if (icon) {
                        icon.style.transform = '';
                    }
                });
            });
            
            // Form input effects
            const formInputs = document.querySelectorAll('.form-group input');
            formInputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
            
            // Animasi saat elemen muncul di viewport
            const sectionObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Terapkan animasi pada section
            const sections = document.querySelectorAll('section');
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                sectionObserver.observe(section);
            });
        });
    </script>
</body>
</html>