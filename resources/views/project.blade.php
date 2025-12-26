<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/Logo%20AORTA%20(2).png">
    <title>Projects - AORTA Malang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="css/general.css">
    <style>
        /* CSS INTERNAL KHUSUS PROJECT PAGE SAJA */
        
        /* HEADER STYLES */
        header {
            background-image: linear-gradient(rgba(21, 64, 105, 0.8), rgba(21, 64, 105, 0.9)), url('img/Peka.JPG');
            background-size: cover;
            background-position: center 60%;
            color: white;
            padding: 2rem 0;
            text-align: center;
            position: relative;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(42, 75, 124, 0.8) 0%, rgba(26, 154, 169, 0.6) 100%);
            z-index: 1;
        }

        .header-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero-text-container {
            text-align: center;
            z-index: 3;
            width: 100%;
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

        /* MODIFIKASI TAGLINE */
        .tagline {
            font-size: 3.5rem;
            font-weight: 800;
            margin: 0 0 1.5rem 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            text-align: center;
            letter-spacing: -0.5px;
            background: linear-gradient(to right, #ffffff, #e0f7fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tagline-sub {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 3rem;
            opacity: 0.9;
            max-width: 600px;
            line-height: 1.6;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 0.8rem 2rem;
            margin: 0 auto 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            max-width: 1200px;
            position: sticky;
            top: 20px;
            z-index: 1000;
            transition: all 0.3s ease;
            width: 90%;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* HIGHLIGHT PROJECT SECTION */
        .highlight-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }

        .highlight-section::before {
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
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.8rem;
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
            color: #666;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .highlight-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .highlight-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12);
        }

        .highlight-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, var(--secondary), #00bcd4);
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 4px 12px rgba(0, 188, 212, 0.3);
        }

        .highlight-content {
            display: flex;
            min-height: 400px;
        }

        .highlight-image {
            flex: 1;
            min-width: 300px;
            overflow: hidden;
            position: relative;
        }

        .highlight-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to right, rgba(0,0,0,0.1), transparent);
            z-index: 1;
        }

        .highlight-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .highlight-card:hover .highlight-image img {
            transform: scale(1.05);
        }

        .highlight-details {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .highlight-details h3 {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .highlight-details p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .highlight-stats {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
            min-width: 100px;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }

        .highlight-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }

        .highlight-tag {
            background: #e3f2fd;
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .highlight-tag:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .highlight-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: fit-content;
            box-shadow: 0 6px 20px rgba(42, 75, 124, 0.3);
        }

        .highlight-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(42, 75, 124, 0.4);
            background-color: var(--primary);
        }

        .highlight-cta i {
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .highlight-cta:hover i {
            transform: translateX(5px);
        }

        /* PROJECTS GRID SECTION */
        .projects-section {
            padding: 6rem 0;
            background: white;
            position: relative;
        }

        .projects-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #ddd, transparent);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 32px;
            margin-bottom: 48px;
            width: 100%;
        }
        
        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

        .project-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06), 0 4px 16px rgba(0, 0, 0, 0.04);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            border: 1px solid #e8e8e8;
            height: 100%;
            display: flex;
            flex-direction: column;
            will-change: transform;
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12), 0 16px 48px rgba(0, 0, 0, 0.08);
            border-color: rgba(0, 188, 212, 0.3);
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 10;
        }

        .project-card:hover::before {
            transform: scaleX(1);
        }

        .project-image {
            min-height: 240px;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        
        .project-image img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            transition: transform 0.5s ease;
            display: block;
        }

        .project-card:hover .project-image img {
            transform: scale(1.05);
        }

        .project-content {
            padding: 28px;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
        }
        
        .project-content h3 {
            font-size: 1.4rem;
            color: var(--primary);
            margin: 0 0 14px 0;
            font-weight: 700;
            line-height: 1.4;
            transition: color 0.3s ease;
        }
        
        .project-card:hover .project-content h3 {
            color: var(--secondary);
        }

        .project-content p {
            color: #555;
            font-size: 0.96rem;
            line-height: 1.75;
            margin-bottom: 22px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* HAPUS STYLING UNTUK PROJECT STATUS */
        /* .project-status {
            background: #e8f5e9;
            color: #4caf50;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        } */

        /* MODIFIKASI PROJECT META TANPA STATUS */
        .project-meta {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 2px solid #f5f5f5;
            gap: 16px;
            flex-wrap: wrap;
        }

        .project-date {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #777;
            font-size: 0.88rem;
            font-weight: 600;
            background: #f8f9fa;
            padding: 6px 12px;
            border-radius: 6px;
        }

        .project-date i {
            margin-right: 8px;
            color: var(--secondary);
        }

        .project-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 18px;
            margin-top: auto;
        }

        .project-tag {
            background: rgba(0, 188, 212, 0.08);
            color: var(--secondary);
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1.5px solid rgba(0, 188, 212, 0.25);
            letter-spacing: 0.3px;
        }
        
        .project-tag:hover {
            background: var(--secondary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 188, 212, 0.25);
        }

        .project-card:hover .project-tag {
            background: #e3f2fd;
            color: var(--primary);
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.92rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: auto;
            width: fit-content;
            padding: 12px 24px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--secondary) 0%, #0097a7 100%);
            box-shadow: 0 4px 12px rgba(0, 220, 249, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .project-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .project-link:hover::before {
            left: 100%;
        }
        
        .project-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 188, 212, 0.35);
        }

        .project-link:hover {
            color: var(--primary);
        }

        .project-link i {
            margin-left: 8px;
            transition: transform 0.2s ease;
        }

        .project-link:hover i {
            transform: translateX(3px);
        }

        /* SLIDER CONTROLS */
        .slider-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 40px;
            position: relative;
        }

        .slider-nav {
            display: flex;
            gap: 15px;
        }

        .slider-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            border: 2px solid var(--primary);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .slider-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(42, 75, 124, 0.3);
        }

        .slider-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .slider-btn:disabled:hover {
            background: white;
            color: var(--primary);
        }

        .slider-dots {
            display: flex;
            gap: 10px;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ddd;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-dot.active {
            background: var(--primary);
            transform: scale(1.2);
        }

        .slider-dot:hover {
            background: var(--secondary);
        }

        .slider-auto {
            position: absolute;
            right: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            font-size: 0.9rem;
        }

        .auto-toggle {
            width: 40px;
            height: 20px;
            background: #ddd;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .auto-toggle.active {
            background: var(--secondary);
        }

        .auto-toggle::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .auto-toggle.active::after {
            transform: translateX(20px);
        }

        /* VIEW ALL BUTTON */
        .view-all {
            text-align: center;
            margin-top: 50px;
        }

        .btn-view-all {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--primary);
            padding: 15px 40px;
            border: 2px solid var(--primary);
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-view-all:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(42, 75, 124, 0.3);
        }

        .btn-view-all i {
            transition: transform 0.3s ease;
        }

        .btn-view-all:hover i {
            transform: translateY(3px);
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 1200px) {
            .projects-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
            
            .highlight-content {
                flex-direction: column;
            }
            
            .highlight-image {
                min-height: 300px;
            }
        }

        @media (max-width: 992px) {
            .tagline {
                font-size: 2.8rem;
            }
            
            .navbar {
                width: 95%;
                padding: 0.8rem 1.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 768px) {
            .tagline {
                font-size: 2.2rem;
            }
            
            .tagline-sub {
                font-size: 1rem;
            }
            
            .projects-grid {
                grid-template-columns: 1fr;
            }
            
            .highlight-stats {
                gap: 1rem;
            }
            
            .stat-item {
                min-width: 80px;
                padding: 10px;
            }
            
            .slider-controls {
                flex-direction: column;
                gap: 20px;
            }
            
            .slider-auto {
                position: relative;
                right: auto;
                margin-top: 10px;
            }
            
            .highlight-details {
                padding: 2rem;
            }
            
            .highlight-details h3 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .tagline {
                font-size: 1.8rem;
            }
            
            .navbar {
                border-radius: 25px;
                padding: 0.8rem 1rem;
            }
            
            .highlight-badge {
                top: 10px;
                left: 10px;
                padding: 6px 15px;
                font-size: 0.8rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .slider-btn {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }

        /* ANIMATIONS */
        .animate-on-scroll {
            opacity: 1; /* Start fully visible */
            transform: none; /* Remove initial transform */
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-content">
            <nav class="navbar" id="navbar">
                <div class="nav-logo">
                    <img src="img/Logo%20AORTA%20(2).png" alt="AORTA Malang Logo" class="logo-img">
                </div>
                
                <button class="menu-toggle" id="menuToggle">☰</button>
                
                <ul class="nav-menu" id="navMenu">
                     <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('artikel.index') }}" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}" class="nav-link active">Proyek</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">{{ Auth::user()->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                        </li>
                    @endauth
                </ul>
            </nav>
            <div class="hero-text-container">
                <h1 class="tagline">Inovasi & Aksi Nyata</h1>
                <p class="tagline-sub">Temukan berbagai proyek inovatif AORTA Malang dalam mendorong perubahan positif untuk kesehatan remaja</p>
                <a href="#highlight" class="learn-more-btn">Jelajahi Proyek</a>
            </div>
        </div>
    </header>

    <main>
        <!-- Highlight Project Section -->
        <section id="highlight" class="highlight-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Proyek Unggulan</h2>
                    <p class="section-subtitle">Proyek terbaru dan terbaik yang telah kami selesaikan dengan dampak signifikan bagi komunitas</p>
                </div>
                
                <div class="highlight-card">
                    <div class="highlight-badge">
                        <i class="fas fa-star"></i> PROYEK TERBARU
                    </div>
                    <div class="highlight-content">
                        <div class="highlight-image">
                            <img src="img/Ruang%20pulih.jpeg" alt="Uffi Cantik - Proyek Unggulan">
                        </div>
                        <div class="highlight-details">
                            <h3>Uffi Cantik: Program Edukasi Kesehatan Reproduksi Remaja Putri</h3>
                            <p>Program komprehensif yang memberikan edukasi kesehatan reproduksi, kebersihan diri, dan pembekalan life skills untuk remaja putri di Malang. Program ini telah menjangkau lebih dari 500 peserta dengan hasil yang signifikan dalam meningkatkan pengetahuan dan praktik kesehatan reproduksi.</p>
                            
                            <div class="highlight-stats">
                                <div class="stat-item">
                                    <span class="stat-number">500+</span>
                                    <span class="stat-label">Peserta</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">12</span>
                                    <span class="stat-label">Sesi</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">95%</span>
                                    <span class="stat-label">Kepuasan</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">2024</span>
                                    <span class="stat-label">Tahun</span>
                                </div>
                            </div>
                            
                            <div class="highlight-tags">
                                <span class="highlight-tag">Kesehatan Reproduksi</span>
                                <span class="highlight-tag">Pemberdayaan Perempuan</span>
                                <span class="highlight-tag">Edukasi Remaja</span>
                                <span class="highlight-tag">Kesehatan Mental</span>
                            </div>
                            
                            <a href="#" class="highlight-cta"> Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Grid Section with Slider -->
        <section id="projects" class="projects-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Semua Proyek Kami</h2>
                    <p class="section-subtitle">Jelajahi berbagai inisiatif dan program yang telah kami selesaikan untuk kesehatan remaja</p>
                </div>
                
                <!-- Projects Grid (First 6 projects) -->
                <div class="projects-grid" id="projects-grid">
                    <!-- Project 1 -->
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="img/Ruang pulih.jpeg" alt="Uffi Cantik" loading="eager" onerror="this.onerror=null; this.src='img/placeholder.jpg';">
                        </div>
                        <div class="project-content">
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> Mar 2024
                                </div>
                                <!-- STATUS DIHAPUS DARI SINI -->
                            </div>
                            <h3>Uffi Cantik</h3>
                            <p>Program edukasi kesehatan reproduksi dan kebersihan diri untuk remaja putri, memberikan pengetahuan tentang perubahan tubuh, menstruasi, dan perawatan diri yang tepat.</p>
                            <div class="project-tags">
                                <span class="project-tag">Reproduksi</span>
                                <span class="project-tag">Kebersihan</span>
                                <span class="project-tag">Remaja Putri</span>
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="img/Heart.JPG" alt="Aorta Sahabat">
                        </div>
                        <div class="project-content">
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> Feb 2024
                                </div>
                                <!-- STATUS DIHAPUS DARI SINI -->
                            </div>
                            <h3>Aorta Sahabat</h3>
                            <p>Program pendampingan dan konseling untuk kesehatan mental remaja, memberikan dukungan psikologis dan ruang aman untuk berbagi permasalahan.</p>
                            <div class="project-tags">
                                <span class="project-tag">Mental Health</span>
                                <span class="project-tag">Konseling</span>
                                <span class="project-tag">Dukungan</span>
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="img/Peka%202.JPG" alt="Podcast with Uffi Cantik">
                        </div>
                        <div class="project-content">
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> Jan 2024
                                </div>
                                <!-- STATUS DIHAPUS DARI SINI -->
                            </div>
                            <h3>Podcast with Uffi Cantik</h3>
                            <p>Diskusi interaktif tentang isu-isu kesehatan remaja melalui platform podcast, menghadirkan narasumber ahli dan membahas topik-topik relevan.</p>
                            <div class="project-tags">
                                <span class="project-tag">Media</span>
                                <span class="project-tag">Edukasi</span>
                                <span class="project-tag">Digital</span>
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Project 4 -->
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="img/beyond.jpg" alt="Beyond The Limits" loading="eager" onerror="this.onerror=null; this.src='img/placeholder.jpg';">
                        </div>
                        <div class="project-content">
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> Dec 2023
                                </div>
                                <!-- STATUS DIHAPUS DARI SINI -->
                            </div>
                            <h3>Beyond The Limits</h3>
                            <p>Workshop pengembangan diri dan mindset untuk remaja dalam menghadapi tantangan global dan persiapan karir masa depan.</p>
                            <div class="project-tags">
                                <span class="project-tag">Pengembangan Diri</span>
                                <span class="project-tag">Mindset</span>
                                <span class="project-tag">Karir</span>
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Project 5 -->
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="img/sharehappines.jpg" alt="AORTA Share Happiness">
                        </div>
                        <div class="project-content">
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> Nov 2023
                                </div>
                                <!-- STATUS DIHAPUS DARI SINI -->
                            </div>
                            <h3>AORTA Share Happiness</h3>
                            <p>Program berbagi kebahagiaan melalui kegiatan sosial dan edukasi kesehatan di komunitas kurang mampu di wilayah Malang.</p>
                            <div class="project-tags">
                                <span class="project-tag">Sosial</span>
                                <span class="project-tag">Komunitas</span>
                                <span class="project-tag">Edukasi</span>
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Project 6 -->
                    <div class="project-card animate-on-scroll">
                        <div class="project-image">
                            <img src="img/Girls Support.jpg" alt="Girls Support Program">
                        </div>
                        <div class="project-content">
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> Oct 2023
                                </div>
                                <!-- STATUS DIHAPUS DARI SINI -->
                            </div>
                            <h3>Girls Support Program</h3>
                            <p>Program dukungan khusus untuk remaja putri dalam menghadapi berbagai tantangan masa remaja melalui kelompok support dan mentoring.</p>
                            <div class="project-tags">
                                <span class="project-tag">Support Group</span>
                                <span class="project-tag">Mentoring</span>
                                <span class="project-tag">Remaja Putri</span>
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Slider Controls -->
                <div class="slider-controls">
                    <div class="slider-nav">
                        <button class="slider-btn" id="prevBtn" aria-label="Previous projects">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="slider-btn" id="nextBtn" aria-label="Next projects">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    
                    <div class="slider-dots" id="sliderDots">
                        <!-- Dots will be generated by JavaScript -->
                    </div>
                    
                    <div class="slider-auto">
                        <span>Auto Slide:</span>
                        <div class="auto-toggle active" id="autoToggle">
                            <div class="auto-toggle-handle"></div>
                        </div>
                    </div>
                </div>
                
                <!-- View All Button -->
                <div class="view-all">
                    <button class="btn-view-all">
                        Lihat Semua Proyek <i class="fas fa-arrow-down"></i>
                    </button>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content footer-top-border">
            <div class="copyright">2025 - AORTA MALANG</div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Navigation
            const navbar = document.getElementById('navbar');
            const header = document.querySelector('header');
            const headerHeight = header.offsetHeight;
            const menuToggle = document.getElementById('menuToggle');
            const navMenu = document.getElementById('navMenu');
            const navLinks = document.querySelectorAll('.nav-link');
            
            // Sticky navigation
            function handleScroll() {
                if (window.scrollY > headerHeight - 100) {
                    navbar.classList.add('sticky');
                } else {
                    navbar.classList.remove('sticky');
                }
            }
            
            window.addEventListener('scroll', handleScroll);
            
            // Mobile menu
            if (menuToggle && navMenu) {
                menuToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                });
            }
            
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                    }
                });
            });
            
            // Smooth scroll
            const learnMoreBtn = document.querySelector('.learn-more-btn');
            if (learnMoreBtn) {
                learnMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            }
            
            // Projects Slider
            const projectsGrid = document.getElementById('projects-grid');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const sliderDots = document.getElementById('sliderDots');
            const autoToggle = document.getElementById('autoToggle');
            
            // Project data - semua proyek sudah selesai
            const allProjects = [
                {
                    title: "Uffi Cantik",
                    description: "Program edukasi kesehatan reproduksi dan kebersihan diri untuk remaja putri.",
                    image: "img/Ruang%20pulih.jpeg",
                    date: "Mar 2024",
                    tags: ["Reproduksi", "Kebersihan", "Remaja Putri"]
                },
                {
                    title: "Aorta Sahabat",
                    description: "Program pendampingan dan konseling untuk kesehatan mental remaja.",
                    image: "img/Heart.JPG",
                    date: "Feb 2024",
                    tags: ["Mental Health", "Konseling", "Dukungan"]
                },
                {
                    title: "Podcast with Uffi Cantik",
                    description: "Diskusi interaktif tentang isu-isu kesehatan remaja melalui platform podcast.",
                    image: "img/Peka%202.JPG",
                    date: "Jan 2024",
                    tags: ["Media", "Edukasi", "Digital"]
                },
                {
                    title: "Beyond The Limits",
                    description: "Workshop pengembangan diri dan mindset untuk remaja.",
                    image: "img/beyond.jpg",
                    date: "Dec 2023",
                    tags: ["Pengembangan Diri", "Mindset", "Karir"]
                },
                {
                    title: "AORTA Share Happiness",
                    description: "Program berbagi kebahagiaan melalui kegiatan sosial dan edukasi kesehatan.",
                    image: "img/sharehappines.jpg",
                    date: "Nov 2023",
                    tags: ["Sosial", "Komunitas", "Edukasi"]
                },
                {
                    title: "Girls Support Program",
                    description: "Program dukungan khusus untuk remaja putri dalam menghadapi berbagai tantangan.",
                    image: "img/Girls Support.jpg",
                    date: "Oct 2023",
                    tags: ["Support Group", "Mentoring", "Remaja Putri"]
                },
                // Additional projects for sliding
                {
                    title: "Nutrition Workshop",
                    description: "Workshop gizi seimbang untuk remaja dengan aktivitas padat.",
                    image: "img/nutrition.jpg",
                    date: "Sep 2023",
                    tags: ["Gizi", "Workshop", "Kesehatan"]
                },
                {
                    title: "Mental Health Awareness",
                    description: "Kampanye kesadaran kesehatan mental di sekolah-sekolah.",
                    image: "img/mental-health.jpg",
                    date: "Aug 2023",
                    tags: ["Mental Health", "Awareness", "Sekolah"]
                },
                {
                    title: "Youth Leadership Camp",
                    description: "Pelatihan kepemimpinan untuk remaja dengan potensi.",
                    image: "img/leadership.jpg",
                    date: "Jul 2023",
                    tags: ["Kepemimpinan", "Pelatihan", "Remaja"]
                },
                {
                    title: "Healthy Lifestyle Campaign",
                    description: "Kampanye gaya hidup sehat melalui media sosial dan komunitas.",
                    image: "img/lifestyle.jpg",
                    date: "Jun 2023",
                    tags: ["Gaya Hidup", "Kampanye", "Media Sosial"]
                },
                {
                    title: "Digital Health Education",
                    description: "Platform edukasi kesehatan digital untuk remaja.",
                    image: "img/digital.jpg",
                    date: "May 2023",
                    tags: ["Digital", "Edukasi", "Platform"]
                },
                {
                    title: "Community Health Screening",
                    description: "Program skrining kesehatan gratis untuk komunitas.",
                    image: "img/screening.jpg",
                    date: "Apr 2023",
                    tags: ["Skrining", "Kesehatan", "Komunitas"]
                }
            ];
            
            let currentSlide = 0;
            const projectsPerPage = 6;
            const totalSlides = Math.ceil(allProjects.length / projectsPerPage);
            let autoSlideInterval;
            
            // Initialize slider
            function initSlider() {
                createDots();
                renderProjects();
                startAutoSlide();
                
                // Event listeners
                prevBtn.addEventListener('click', goToPrevSlide);
                nextBtn.addEventListener('click', goToNextSlide);
                autoToggle.addEventListener('click', toggleAutoSlide);
                
                // Update button states
                updateButtonStates();
            }
            
            // Create dots for navigation
            function createDots() {
                sliderDots.innerHTML = '';
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.className = `slider-dot ${i === 0 ? 'active' : ''}`;
                    dot.setAttribute('data-slide', i);
                    dot.addEventListener('click', () => goToSlide(i));
                    sliderDots.appendChild(dot);
                }
            }
            
            // Render projects for current slide
            function renderProjects() {
                projectsGrid.innerHTML = '';
                
                const startIndex = currentSlide * projectsPerPage;
                const endIndex = startIndex + projectsPerPage;
                const currentProjects = allProjects.slice(startIndex, endIndex);
                
                currentProjects.forEach((project, index) => {
                    const projectCard = document.createElement('div');
                    projectCard.className = 'project-card animate-on-scroll';
                    
                    // Buat elemen gambar
                    const imageContainer = document.createElement('div');
                    imageContainer.className = 'project-image';
                    
                    const img = document.createElement('img');
                    img.src = project.image;
                    img.alt = project.title;
                    img.loading = 'eager';
                    
                    // Tambahkan error handler sederhana
                    img.onerror = function() {
                        this.onerror = null;
                        this.src = 'img/placeholder.jpg';
                    };
                    
                    imageContainer.appendChild(img);
                    
                    // Buat konten proyek
                    const projectContent = document.createElement('div');
                    projectContent.className = 'project-content';
                    projectContent.innerHTML = `
                            <div class="project-meta">
                                <div class="project-date">
                                    <i class="far fa-calendar"></i> ${project.date}
                                </div>
                            </div>
                            <h3>${project.title}</h3>
                            <p>${project.description}</p>
                            <div class="project-tags">
                                ${project.tags.map(tag => `<span class="project-tag">${tag}</span>`).join('')}
                            </div>
                            <a href="#" class="project-link">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                        `;
                        
                    // Gabungkan semua elemen
                    projectCard.appendChild(imageContainer);
                    projectCard.appendChild(projectContent);
                    projectsGrid.appendChild(projectCard);
                });
                
                // Update active dot
                updateDots();
                
                // Add animation to cards
                setTimeout(() => {
                    document.querySelectorAll('.animate-on-scroll').forEach(card => {
                        card.classList.add('visible');
                    });
                }, 100);
            }
            
            // Update active dots
            function updateDots() {
                document.querySelectorAll('.slider-dot').forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }
            
            // Update button states
            function updateButtonStates() {
                prevBtn.disabled = currentSlide === 0;
                nextBtn.disabled = currentSlide === totalSlides - 1;
            }
            
            // Go to specific slide
            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                renderProjects();
                updateButtonStates();
                resetAutoSlide();
            }
            
            // Go to previous slide
            function goToPrevSlide() {
                if (currentSlide > 0) {
                    currentSlide--;
                    renderProjects();
                    updateButtonStates();
                    resetAutoSlide();
                }
            }
            
            // Go to next slide
            function goToNextSlide() {
                if (currentSlide < totalSlides - 1) {
                    currentSlide++;
                    renderProjects();
                    updateButtonStates();
                    resetAutoSlide();
                }
            }
            
            // Auto slide functionality
            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    if (currentSlide < totalSlides - 1) {
                        goToNextSlide();
                    } else {
                        goToSlide(0);
                    }
                }, 5000);
            }
            
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                if (autoToggle.classList.contains('active')) {
                    startAutoSlide();
                }
            }
            
            function toggleAutoSlide() {
                autoToggle.classList.toggle('active');
                if (autoToggle.classList.contains('active')) {
                    startAutoSlide();
                } else {
                    clearInterval(autoSlideInterval);
                }
            }
            
            // Initialize slider
            initSlider();
            
            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Apply animations to sections
            const sections = document.querySelectorAll('section');
            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });
            
            // View All button
            const viewAllBtn = document.querySelector('.btn-view-all');
            if (viewAllBtn) {
                viewAllBtn.addEventListener('click', function() {
                    // In real app, this would redirect to all projects page
                    alert('Fitur "Lihat Semua Proyek" akan mengarahkan ke halaman khusus dengan semua proyek.');
                });
            }
            
            // Highlight CTA
            const highlightCta = document.querySelector('.highlight-cta');
            if (highlightCta) {
                highlightCta.addEventListener('click', function(e) {
                    e.preventDefault();
                    // In real app, this would open project detail modal/page
                    alert('Fitur "Pelajari Lebih Lanjut" akan menampilkan detail lengkap proyek.');
                });
            }
            
            // Project links
            document.addEventListener('click', function(e) {
                if (e.target.closest('.project-link')) {
                    e.preventDefault();
                    // In real app, this would open project detail modal/page
                    alert('Fitur "Lihat Detail" akan menampilkan informasi lengkap tentang proyek.');
                }
            });
        });
    </script>
</body>
</html>