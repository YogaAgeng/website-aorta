<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/Logo%20AORTA%20(2).png">
    <title>Artikel - AORTA Malang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/general.css">
    <style>
        /* CSS INTERNAL KHUSUS HOMEPAGE */
        :root {
            --primary: #154069;
            --accent: #fcd1ad;
            --light: #f1faee;
            --dark: #1d3557;
            --text: #333333;
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
        
        /* Header Styles */
        header {
            background-image: linear-gradient(rgba(21, 64, 105, 0.5), rgba(21, 64, 105, 0.5)), url('img/Girls support.JPG');
            background-size: cover;
            background-position: center 85%;
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
        
        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
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
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
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

        /* MODIFIKASI TOMBOL (opsional) */
        .learn-more-btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background-color: #154069;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .learn-more-btn:hover {
            background-color: #2c5aa0;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
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
            font-size: 1.8rem;
        }
        
        h3 {
            color: var(--dark);
            margin: 1.5rem 0 1rem;
        }
        
        p {
            margin-bottom: 1rem;
        }
        
        /* Artikel Styles */
        .articles-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .article-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        
        .card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.8rem;
            font-size: 0.85rem;
            color: #777;
        }
        
        .card-title {
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            color: var(--primary);
            line-height: 1.4;
        }
        
        .card-excerpt {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 1.2rem;
        }
        
        .card-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
        }
        
        .card-link::after {
            content: '→';
            margin-left: 0.3rem;
            transition: transform 0.3s;
        }
        
        .card-link:hover::after {
            transform: translateX(3px);
        }
        
        /* Load More Button */
        .section-header-with-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .section-header-with-button h2 {
            margin-bottom: 0;
            border-bottom: none;
        }
        
        .load-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary) 0%, #2c5aa0 100%);
            color: white;
            padding: 14px 32px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 12px rgba(21, 64, 105, 0.2);
            text-decoration: none;
        }
        
        .load-more-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(21, 64, 105, 0.35);
            background: linear-gradient(135deg, #2c5aa0 0%, var(--primary) 100%);
        }
        
        .load-more-btn i {
            transition: transform 0.3s ease;
        }
        
        .load-more-btn:hover i {
            transform: translateY(3px);
        }
        
        /* Featured Article */
        .featured-article {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 3rem;
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .featured-image {
            flex: 1;
            min-width: 300px;
        }
        
        .featured-img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .featured-content {
            flex: 2;
            min-width: 300px;
        }
        
        .article-meta {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #777;
            font-size: 0.9rem;
        }
        
        .article-date {
            background-color: var(--primary);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            font-weight: 500;
            margin-right: 1rem;
        }
        
        .article-category {
            color: var(--primary);
            font-weight: 500;
        }
        
        .article-title {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        .article-excerpt {
            color: #555;
            margin-bottom: 1.5rem;
        }
        
        .read-more {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .read-more:hover {
            background-color: #2c5aa0;
        }
        
        /* Sidebar */
        .sidebar {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .sidebar-title {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .sidebar-articles {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .sidebar-article {
            display: flex;
            gap: 1rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .sidebar-article:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        .sidebar-article-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .sidebar-article-content {
            flex: 1;
        }
        
        .sidebar-article-date {
            font-size: 0.8rem;
            color: #777;
            margin-bottom: 0.3rem;
        }
        
        .sidebar-article-title {
            font-size: 1rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }
        
        .sidebar-article-excerpt {
            font-size: 0.85rem;
            color: #777;
        }
        
        /* Main Content Layout */
        .main-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        /* Footer Styles */
        footer {
            background-color: var(--primary);
            color: white;
            padding: 2rem 0 1rem;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-top-border {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .copyright {
            font-size: 0.9rem;
        }
        
        .social-media {
            display: flex;
            gap: 1rem;
        }
        
        .social-icon {
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-icon:hover {
            color: var(--accent);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                order: -1;
            }
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--primary);
                padding: 1rem 0;
                z-index: 10;
            }
            
            .nav-menu.active {
                display: flex;
            }
            
            .nav-item {
                margin: 0.5rem 0;
                text-align: center;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .tagline {
                font-size: 1.5rem;
            }
            
            main {
                padding: 1rem;
            }
            
            section {
                padding: 1.5rem;
            }
            
            .featured-article, .profile-content {
                flex-direction: column;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
        
        @media (max-width: 576px) {
            .articles-container {
                grid-template-columns: 1fr;
            }
            
            .sidebar-article {
                flex-direction: column;
            }
            
            .sidebar-article-image {
                width: 100%;
                height: 150px;
            }
            
            .section-header-with-button {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .load-more-btn {
                font-size: 0.9rem;
                padding: 12px 24px;
            }
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
                        <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/articles') }}" class="nav-link active">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/project') }}" class="nav-link">Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="nav-link">Daftar</a>
                    </li>
                </ul>
            </nav>
            <div class="hero-text-container">
                <div class="tagline">Artikel Kesehatan Remaja</div>
                <a href="#articles-section" class="learn-more-btn">Jelajahi Artikel</a>
            </div>
        </div>
    </header>

    <main>
        <section id="articles-section">
            <h2>Artikel Terbaru</h2>
            <div class="main-content">
                <!-- Artikel Utama -->
                <section class="featured-article">
                    <div class="featured-image">
                        <img src="https://source.unsplash.com/random/600x400/?teen-health" alt="Artikel Utama" class="featured-img">
                    </div>
                    <div class="featured-content">
                        <div class="article-meta">
                            <span class="article-date">1 Juli 2023</span>
                            <span class="article-category">Kesehatan Mental</span>
                        </div>
                        <h2 class="article-title">Mengenal dan Mengelola Stres di Masa Remaja</h2>
                        <p class="article-excerpt">Remaja seringkali menghadapi berbagai tekanan dari sekolah, pertemanan, dan keluarga. Artikel ini membahas cara mengenali tanda-tanda stres dan strategi efektif untuk mengelolanya dengan sehat.</p>
                        <a href="#" class="read-more">Baca Selengkapnya</a>
                    </div>
                </section>

                <!-- Sidebar -->
                <aside class="sidebar">
                    <h3 class="sidebar-title">Artikel Populer</h3>
                    <div class="sidebar-articles">
                        <div class="sidebar-article">
                            <img src="https://source.unsplash.com/random/150x150/?nutrition" alt="Artikel 1" class="sidebar-article-image">
                            <div class="sidebar-article-content">
                                <div class="sidebar-article-date">2 Juni 2023</div>
                                <h4 class="sidebar-article-title">Pola Makan Seimbang untuk Remaja Aktif</h4>
                                <p class="sidebar-article-excerpt">Tips memenuhi kebutuhan gizi harian dengan makanan yang mudah didapat...</p>
                            </div>
                        </div>
                        <div class="sidebar-article">
                            <img src="https://source.unsplash.com/random/150x150/?exercise" alt="Artikel 2" class="sidebar-article-image">
                            <div class="sidebar-article-content">
                                <div class="sidebar-article-date">3 Juli 2023</div>
                                <h4 class="sidebar-article-title">Olahraga yang Cocok untuk Remaja</h4>
                                <p class="sidebar-article-excerpt">Rekomendasi jenis olahraga yang menyenangkan dan bermanfaat...</p>
                            </div>
                        </div>
                        <div class="sidebar-article">
                            <img src="https://source.unsplash.com/random/150x150/?sleep" alt="Artikel 3" class="sidebar-article-image">
                            <div class="sidebar-article-content">
                                <div class="sidebar-article-date">4 Juni 2023</div>
                                <h4 class="sidebar-article-title">Pentingnya Tidur Cukup bagi Remaja</h4>
                                <p class="sidebar-article-excerpt">Dampak kurang tidur terhadap perkembangan dan prestasi akademik...</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <section>
            <div class="section-header-with-button">
                <h2>Artikel Lainnya</h2>
                <a href="#" class="load-more-btn">
                    Lihat Lebih Banyak >
                </a>
            </div>
            <div class="articles-container">
                <article class="article-card">
                    <img src="https://source.unsplash.com/random/400x250/?hygiene" alt="Artikel 1" class="card-image">
                    <div class="card-content">
                        <div class="card-meta">
                            <span>15 Mei 2023</span>
                            <span>Kesehatan</span>
                        </div>
                        <h3 class="card-title">PHBS: Langkah Sederhana Menuju Hidup Sehat</h3>
                        <p class="card-excerpt">Perilaku Hidup Bersih dan Sehat (PHBS) adalah kunci utama mencegah berbagai penyakit. Pelajari cara menerapkannya dalam kehidupan sehari-hari.</p>
                        <a href="#" class="card-link">Baca Selengkapnya</a>
                    </div>
                </article>
                <article class="article-card">
                    <img src="https://source.unsplash.com/random/400x250/?friends" alt="Artikel 2" class="card-image">
                    <div class="card-content">
                        <div class="card-meta">
                            <span>22 April 2023</span>
                            <span>Psikologi</span>
                        </div>
                        <h3 class="card-title">Membangun Pertemanan Sehat di Era Digital</h3>
                        <p class="card-excerpt">Di era media sosial, penting untuk menjaga kualitas pertemanan. Temukan cara membangun hubungan yang sehat dan saling mendukung.</p>
                        <a href="#" class="card-link">Baca Selengkapnya</a>
                    </div>
                </article>
                <article class="article-card">
                    <img src="https://source.unsplash.com/random/400x250/?reproductive-health" alt="Artikel 3" class="card-image">
                    <div class="card-content">
                        <div class="card-meta">
                            <span>10 Maret 2023</span>
                            <span>Kesehatan Reproduksi</span>
                        </div>
                        <h3 class="card-title">Pemahaman Dasar Kesehatan Reproduksi Remaja</h3>
                        <p class="card-excerpt">Informasi penting tentang perubahan tubuh dan kesehatan reproduksi yang perlu diketahui setiap remaja.</p>
                        <a href="#" class="card-link">Baca Selengkapnya</a>
                    </div>
                </article>
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
            
            // Smooth scroll untuk tombol Learn More
            const learnMoreBtn = document.querySelector('.learn-more-btn');
            if (learnMoreBtn) {
                learnMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
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
        });
    </script>
</body>
</html>