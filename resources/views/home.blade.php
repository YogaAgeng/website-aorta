<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/Logo%20AORTA%20(2).png">
    <title>AORTA Malang - Belajar, Berkembang, dan Bertindak Bersama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap">
    <!-- Hubungkan ke CSS eksternal -->
    <link rel="stylesheet" href="css/general.css">
    <style>
        /* CSS INTERNAL KHUSUS HOMEPAGE SAJA */
        
        /* Header Styles */
        header {
            background-image: linear-gradient(rgba(21, 64, 105, 0.5), rgba(21, 64, 105, 0.5)), url('img/bghome.png');
            background-size: cover;
            background-position: center 60%;
            background-repeat: no-repeat;
            color: white;
            padding: 2rem 0;
            text-align: center;
            position: relative;
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        header {
            position: relative;
            z-index: 1;
        }
        
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
        
        /* Navigation bar should be above the overlay */
        .navbar {
            position: relative;
            z-index: 1000;
        }
        
        /* Ensure nav links are clickable */
        .nav-link {
            position: relative;
            z-index: 1001;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            padding: 0 2rem;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
        }

        /* MODIFIKASI HEADER CONTENT */
        .header-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            padding: 0 2rem;
            min-height: 400px;
        }

        /* CONTAINER BARU UNTUK TEKS DAN TOMBOL */
        .hero-text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 3;
            width: 100%;
        }

        /* MODIFIKASI TAGLINE */
        .tagline {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 2rem 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        @media (max-width: 768px) {
            .tagline {
                font-size: 1.5rem;
            }
        }
        
        /* About Section */
        .about-content {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
            text-align: justify;
        }
        
        .stats {
            flex: 1;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            background-color: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .stat-text {
            flex: 1;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--text);
        }
        
        /* Issues Section */
        .issues-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .issue-card {
            background-color: var(--primary);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
        }
        
        .issue-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        
        .issue-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--light);
        }
        
        .issue-title {
            font-weight: 600;
            color: var(--light);
            margin-bottom: 0.5rem;
        }
        
        /* Community Partners Section - DIREVISI */
        .partners-section {
            padding: 4rem 2rem;
            background-color: white;
        }

        .partners-section h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--primary);
        }

        .partners-container-wrapper {
            overflow: hidden;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            padding: 2rem 0;
        }

        .partners-track {
            display: flex;
            width: max-content;
            animation: slide 40s linear infinite;
        }

        .partner-item {
            flex: 0 0 200px;
            text-align: center;
            transition: all 0.3s ease;
            margin: 0 1rem;
        }

        .partner-item:hover {
            transform: translateY(-5px);
        }

        .partner-logo-frame {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background-color: white;
            margin: 0 auto 1rem;
            padding: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 3px solid var(--primary);
            transition: all 0.3s ease;
        }

        .partner-item:hover .partner-logo-frame {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-color: var(--secondary);
        }

        .partner-logo {
            width: 80%;
            height: 80%;
            object-fit: contain;
            border-radius: 50%;
        }

        .partner-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            min-height: 2.5em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Animation untuk sliding dari kanan ke kiri */
        @keyframes slide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-210px * 10)); /* 10 items * (200px + 10px margin) */
            }
        }

        /* Pause animation on hover */
        .partners-container-wrapper:hover .partners-track {
            animation-play-state: paused;
        }

        /* Responsive Design untuk Partners */
        @media (max-width: 1024px) {
            .partner-item {
                flex: 0 0 180px;
            }
            
            .partner-logo-frame {
                width: 120px;
                height: 120px;
            }
            
            @keyframes slide {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(calc(-190px * 10)); /* Adjusted for tablet */
                }
            }
        }

        @media (max-width: 768px) {
            .partners-section {
                padding: 3rem 1rem;
            }
            
            .partners-container-wrapper {
                max-width: 100%;
                padding: 1.5rem 0;
            }
            
            .partner-item {
                flex: 0 0 150px;
                margin: 0 0.75rem;
            }
            
            .partner-logo-frame {
                width: 100px;
                height: 100px;
            }
            
            .partner-name {
                font-size: 0.8rem;
            }
            
            @keyframes slide {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(calc(-160px * 10)); /* Adjusted for mobile */
                }
            }
        }

        @media (max-width: 480px) {
            .partner-item {
                flex: 0 0 130px;
                margin: 0 0.5rem;
            }
            
            .partner-logo-frame {
                width: 90px;
                height: 90px;
                padding: 10px;
            }
            
            @keyframes slide {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(calc(-140px * 10)); /* Adjusted for small mobile */
                }
            }
        }
        
        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
            }
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-menu {
            z-index: 1000;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <nav class="navbar" id="navbar">
                <div class="nav-logo">
                    <!-- Logo AORTA -->
                    <img src="img/Logo%20AORTA%20(2).png" alt="AORTA Malang Logo" class="logo-img">
                </div>
                
                <!-- Menu Toggle untuk Mobile -->
                <button class="menu-toggle" id="menuToggle">☰</button>
                
                <ul class="nav-menu" id="navMenu">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link active">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/articles') }}" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/project') }}" class="nav-link">Proyek</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">{{ Auth::user()->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                        </li>
                    @endauth
                </ul>
            </nav>
            <div class="hero-text-container">
                <div class="tagline">Learn, Grow, and Act Together</div>
                <a href="#about" class="learn-more-btn">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </header>

    <main>
        <section id="about" class="about-section">
            <h2>Tentang AORTA Malang</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Komunitas Astra Health Youth Solidarity Action (AORTA) adalah komunitas yang dibina oleh PT. Astra International Tbk, dengan fokus pada kepedulian terhadap isu kesehatan remaja di Indonesia. AORTA pertama kali diresmikan pada 21 November 2019 di Belitung oleh Chief of Corporate Affairs Astra, Bapak Riza Deliansyah, bersama dengan Deputi Pencegahan Badan Narkotika Nasional, Bapak Drs. Anjan Pramuka Putra, SH, M. Hum, dan Sekretaris Utama Badan Kependudukan dan Keluarga Berencana Nasional, Bapak H. Nofrizal, S. P, MA.</p>
                    <p>Selanjutnya, Komunitas AORTA Malang didirikan pada 23 Juli 2024, bertepatan dengan penunjukan Ulfi Sa'adah sebagai koordinator pertama. Pada periode 2024-2025, Komunitas AORTA Malang memiliki 25 anggota pengurus yang berkomitmen untuk melaksanakan berbagai inisiatif. Komunitas ini berhasil menghadirkan lebih dari 500 peserta dalam berbagai acara dan mengimplementasikan delapan proyek eksternal serta tiga proyek internal yang berfokus pada pelatihan dan pengembangan.</p>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-icon">👥</div>
                        <div class="stat-text">
                            <div class="stat-number">25</div>
                            <div class="stat-label">Anggota Pengurus</div>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">🎯</div>
                        <div class="stat-text">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Peserta Acara</div>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">📋</div>
                        <div class="stat-text">
                            <div class="stat-number">9</div>
                            <div class="stat-label">Proyek Dilaksanakan</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="issues" class="issues-section">
            <h2>Fokus Isu</h2>
            <div class="issues-grid">
                <div class="issue-card">
                    <div class="issue-icon"><i class="fas fa-female"></i></div>
                    <div class="issue-title">KESEHATAN REPRODUKSI</div>
                </div>
                <div class="issue-card">
                    <div class="issue-icon"><i class="fas fa-brain"></i></div>
                    <div class="issue-title">KESEHATAN MENTAL</div>
                </div>
                <div class="issue-card">
                    <div class="issue-icon"><i class="fas fa-hand-sparkles"></i></div>
                    <div class="issue-title">PERILAKU HIDUP BERSIH & SEHAT</div>
                </div>
                <div class="issue-card">
                    <div class="issue-icon"><i class="fas fa-apple-alt"></i></div>
                    <div class="issue-title">GIZI REMAJA</div>
                </div>
            </div>
        </section>

        <!-- Community Partners Section (Mengganti Kegiatan Kami) -->
        <section id="partners" class="partners-section">
            <h2>Community Partners</h2>
            <div class="partners-container-wrapper">
                <div class="partners-track" id="partnersSlider">
                    <!-- Partner 1 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner1.png" alt="Logo Komunitas 1" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 1</div>
                    </div>
                    
                    <!-- Partner 2 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner2.png" alt="Logo Komunitas 2" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 2</div>
                    </div>
                    
                    <!-- Partner 3 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner3.png" alt="Logo Komunitas 3" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 3</div>
                    </div>
                    
                    <!-- Partner 4 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner4.png" alt="Logo Komunitas 4" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 4</div>
                    </div>
                    
                    <!-- Partner 5 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner5.png" alt="Logo Komunitas 5" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 5</div>
                    </div>
                    
                    <!-- Partner 6 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner6.png" alt="Logo Komunitas 6" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 6</div>
                    </div>
                    
                    <!-- Partner 7 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner7.png" alt="Logo Komunitas 7" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 7</div>
                    </div>
                    
                    <!-- Partner 8 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner8.png" alt="Logo Komunitas 8" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 8</div>
                    </div>
                    
                    <!-- Partner 9 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner9.png" alt="Logo Komunitas 9" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 9</div>
                    </div>
                    
                    <!-- Partner 10 -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner10.png" alt="Logo Komunitas 10" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 10</div>
                    </div>
                    
                    <!-- Duplikat untuk efek sliding kontinu -->
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner1.png" alt="Logo Komunitas 1" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 1</div>
                    </div>
                    
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner2.png" alt="Logo Komunitas 2" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 2</div>
                    </div>
                    
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner3.png" alt="Logo Komunitas 3" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 3</div>
                    </div>
                    
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner4.png" alt="Logo Komunitas 4" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 4</div>
                    </div>
                    
                    <div class="partner-item">
                        <div class="partner-logo-frame">
                            <img src="img/partner5.png" alt="Logo Komunitas 5" class="partner-logo">
                        </div>
                        <div class="partner-name">Nama Komunitas 5</div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
            </a>
            <a href="https://youtube.com/@aortamalang?si=CszVRgovv8Uhun79" class="social-icon" title="YouTube" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    </div>
</footer>
    <script>
        // JavaScript untuk sticky navigation
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            const header = document.querySelector('header');
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
            
            // Smooth scroll untuk tombol Pelajari Lebih Lanjut
            const learnMoreBtn = document.querySelector('.learn-more-btn');
            if (learnMoreBtn) {
                learnMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 80, // Adjust for sticky nav
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
            }
            
            // Close mobile menu when clicking on a link
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                    }
                });
            });
            
            // Animasi saat elemen muncul di viewport
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
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
                observer.observe(section);
            });
            
            // Community Partners Slider - REVISI SEDERHANA
            const partnersWrapper = document.querySelector('.partners-container-wrapper');
            const partnersTrack = document.querySelector('.partners-track');
            
            if (partnersTrack) {
                // Hentikan animasi saat hover, lanjutkan saat mouse leave
                partnersWrapper.addEventListener('mouseenter', () => {
                    partnersTrack.style.animationPlayState = 'paused';
                });
                
                partnersWrapper.addEventListener('mouseleave', () => {
                    partnersTrack.style.animationPlayState = 'running';
                });
                
                // Reset animasi saat selesai untuk efek infinite yang mulus
                partnersTrack.addEventListener('animationiteration', () => {
                    // Animasi akan otomatis reset ke awal karena infinite loop
                });
            }
            
            // Observer untuk animasi fade in section partners
            const partnersSection = document.querySelector('.partners-section');
            if (partnersSection) {
                partnersSection.style.opacity = '0';
                partnersSection.style.transform = 'translateY(20px)';
                partnersSection.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                const sectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, { threshold: 0.1 });
                
                sectionObserver.observe(partnersSection);
            }
        });
    </script>
</body>
</html>