<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Aorta Malang</title>
    <link rel="icon" type="image/png" href="img/Logo AORTA (2).png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS INTERNAL KHUSUS DASHBOARD ADMIN */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #2A4B7C;
            --secondary: #1A9AA9;
            --accent: #FF6B6B;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --text: #333;
            --text-light: #7f8c8d;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f7fa;
            color: var(--text);
        }

        /* Sidebar/Navbar - FIXED */
        .sidebar {
            width: 260px;
            background: var(--primary);
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow);
            z-index: 100;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .logo {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80px;
        }

        .logo img {
            max-width: 120px;
            height: auto;
            object-fit: contain;
        }

        .nav-menu {
            flex: 1;
            padding: 20px 0;
        }

        .nav-item {
            padding: 15px 25px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid var(--secondary);
        }

        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid var(--secondary);
        }

        .nav-item i {
            width: 24px;
            margin-right: 15px;
            font-size: 18px;
        }

        /* User Info Section with Logout */
        .user-section {
            margin-top: auto;
            padding: 20px 15px;
            background: rgba(0, 0, 0, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 15px;
        }
        
        .user-details h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .user-details p {
            font-size: 13px;
            color: var(--text-light);
        }
        
        .user-actions {
            padding: 15px 20px;
        }
        
        .btn-logout {
            width: 95%;
            padding: 10px;
            background-color: rgba(231, 76, 60, 0.8);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .btn-logout:hover {
            background-color: rgba(192, 57, 43, 0.9);
            transform: translateY(-2px);
        }
        
        .btn-logout i {
            margin-right: 8px;
        }

        /* Main Content - Adjusted for fixed sidebar */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            margin-left: 260px;
            min-height: 100vh;
        }

        .page-content {
            display: none;
        }

        .page-content.active {
            display: block;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--dark);
        }

        /* Search and Filter Styles */
        .page-tools {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
        }

        .search-container {
            flex: 1;
            max-width: 400px;
        }

        .search-box {
            position: relative;
            width: 100%;
        }

        .search-box input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: var(--transition);
        }

        .search-box input:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .search-box button {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background: var(--secondary);
            color: white;
            border: none;
            border-radius: 0 6px 6px 0;
            padding: 0 15px;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-box button:hover {
            background-color: #2980b9;
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .filter-select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            background-color: white;
            cursor: pointer;
            min-width: 180px;
        }

        .filter-select:focus {
            border-color: var(--secondary);
            outline: none;
        }

        .btn-new-item {
            background-color: var(--secondary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .btn-new-item:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-new-item i {
            margin-right: 8px;
        }

        /* Dashboard Specific Styles */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            transition: var(--transition);
            border-left: 4px solid var(--secondary);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(52, 152, 219, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 24px;
            color: var(--secondary);
        }

        .stat-info h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .stat-info p {
            color: var(--text-light);
            font-size: 14px;
        }

        .section-title {
            font-size: 22px;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .activity-list {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
        }

        .activity-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(52, 152, 219, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--secondary);
        }

        .activity-details p {
            margin-bottom: 5px;
            font-weight: 500;
        }

        .activity-time {
            font-size: 12px;
            color: var(--text-light);
        }

        /* Content Grid Styles */
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .content-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-top: 4px solid var(--secondary);
            position: relative;
        }

        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .content-image {
            width: 100%;
            height: 180px;
            overflow: hidden;
            background-color: #f0f0f0;
        }

        .content-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content-body {
            padding: 20px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .content-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .content-id {
            font-size: 12px;
            color: var(--text-light);
            background-color: #f8f9fa;
            padding: 2px 8px;
            border-radius: 10px;
            border: 1px solid #e9ecef;
        }

        .content-description {
            color: var(--text-light);
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Tag Styles */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 15px;
        }

        .tag {
            display: inline-block;
            padding: 4px 10px;
            background-color: #e8f4f8;
            color: var(--secondary);
            border-radius: 15px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid var(--secondary);
        }

        .tag-kesehatan-reproduksi {
            background-color: #ffe8ec;
            color: #e91e63;
            border-color: #e91e63;
        }

        .tag-kesehatan-mental {
            background-color: #e8f4fd;
            color: #2196f3;
            border-color: #2196f3;
        }

        .tag-perilaku-hidup-bersih {
            background-color: #e8f5e9;
            color: #4caf50;
            border-color: #4caf50;
        }

        .tag-gizi-remaja {
            background-color: #fff3e0;
            color: #ff9800;
            border-color: #ff9800;
        }

        .content-meta {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .content-date {
            display: flex;
            align-items: center;
        }

        .content-date i {
            margin-right: 5px;
        }

        /* Author and Uploader Styles */
        .author-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 10px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .author-item {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .author-label {
            font-size: 11px;
            color: var(--text-light);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .author-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
            padding: 4px 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .content-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-edit, .btn-delete {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .btn-edit {
            background-color: #f39c12;
            color: white;
        }

        .btn-edit:hover {
            background-color: #e67e22;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn-edit i, .btn-delete i {
            margin-right: 5px;
        }

        /* No Results Message */
        .no-results {
            text-align: center;
            padding: 40px;
            color: var(--text-light);
            font-size: 16px;
            grid-column: 1 / -1;
        }

        .no-results i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ddd;
        }

        /* Modal Styles - IMPROVED */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        .modal-content {
            background-color: white;
            margin: 2% auto;
            border-radius: 10px;
            width: 90%;
            max-width: 700px;
            max-height: 90vh;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: modalopen 0.4s;
            display: flex;
            flex-direction: column;
        }

        @keyframes modalopen {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .modal-header h2 {
            font-size: 22px;
            color: var(--dark);
            margin: 0;
        }

        .close {
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: var(--text-light);
            line-height: 1;
        }

        .close:hover {
            color: var(--dark);
        }

        .modal-body {
            padding: 25px;
            overflow-y: auto;
            flex: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: var(--transition);
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
            max-height: 150px;
        }

        /* Image Upload Styles */
        .image-upload-container {
            border: 2px dashed #ddd;
            border-radius: 6px;
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            background-color: #f9f9f9;
        }

        .image-upload-container:hover {
            border-color: var(--secondary);
            background-color: #f0f7fa;
        }

        .image-upload-container.dragover {
            border-color: var(--secondary);
            background-color: #e8f4f8;
        }

        .image-upload-icon {
            font-size: 48px;
            color: var(--secondary);
            margin-bottom: 15px;
        }

        .image-upload-text {
            margin-bottom: 15px;
        }

        .image-upload-text p {
            margin: 5px 0;
            color: var(--text-light);
        }

        .image-upload-text strong {
            color: var(--secondary);
        }

        .image-preview {
            margin-top: 20px;
            display: none;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 6px;
            box-shadow: var(--shadow);
        }

        .btn-remove-image {
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .btn-remove-image:hover {
            background-color: #c0392b;
        }

        /* Tags Input Styles */
        .tags-input-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: #f9f9f9;
        }

        .tag-option {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .tag-option input[type="checkbox"] {
            margin: 0;
        }

        .tag-option label {
            margin: 0;
            font-weight: normal;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
            flex-shrink: 0;
        }

        .btn-cancel, .btn-submit {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-cancel {
            background-color: #ecf0f1;
            color: var(--text);
        }

        .btn-cancel:hover {
            background-color: #d5dbdb;
        }

        .btn-submit {
            background-color: var(--secondary);
            color: white;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }

        /* User Section Styles */
        .user-section {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid #2c3e50;
        }

        .user-details {
            margin-top: 15px;
            text-align: center;
        }

        .user-name {
            color: #fff;
            font-weight: 500;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .logout-form {
            margin-top: 15px;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 8px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }

        .btn-logout i {
            font-size: 0.9rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                transform: translateX(0);
            }
            
            .logo img {
                max-width: 50px;
            }
            
            .logo h1, .nav-item span, .user-details {
                display: none;
            }
            
            .logo {
                justify-content: center;
                padding: 25px 10px;
            }
            
            .nav-item {
                padding: 15px;
                justify-content: center;
            }
            
            .nav-item i {
                margin-right: 0;
            }
            
            .user-info {
                justify-content: center;
                padding: 20px 10px;
            }
            
            .user-avatar {
                margin-right: 0;
            }
            
            .main-content {
                margin-left: 80px;
            }

            .modal-content {
                margin: 5% auto;
                width: 95%;
            }

            .page-tools {
                flex-direction: column;
                align-items: stretch;
            }

            .search-container, .filter-container {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                height: auto;
            }
            
            .nav-menu {
                display: flex;
                padding: 0;
            }
            
            .nav-item {
                flex: 1;
                justify-content: center;
                border-left: none;
                border-bottom: 4px solid transparent;
            }
            
            .nav-item:hover, .nav-item.active {
                border-left: none;
                border-bottom: 4px solid var(--secondary);
            }
            
            .user-info {
                display: none;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .modal-content {
                margin: 10% auto;
                width: 95%;
                max-height: 85vh;
            }

            .modal-body {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-cancel, .btn-submit {
                width: 100%;
            }

            .author-info {
                flex-direction: column;
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                margin: 5% auto;
                width: 98%;
                max-height: 90vh;
            }

            .modal-header {
                padding: 15px 20px;
            }

            .modal-body {
                padding: 15px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group input, .form-group textarea, .form-group select {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar/Navbar -->
    <div class="sidebar">
        <div class="logo">
            <img src="img/logoastrasatuIndonesia .png" alt="Aorta Malang Logo">
        </div>
        
        <div class="nav-menu">
            <div class="nav-item active" data-page="dashboard">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </div>
            <div class="nav-item" data-page="artikel">
                <i class="fas fa-newspaper"></i>
                <span>Artikel</span>
            </div>
            <div class="nav-item" data-page="project">
                <i class="fas fa-project-diagram"></i>
                <span>Project</span>
            </div>
        </div>
        
        <!-- User Section with Logout -->
        <div class="user-section">
            <div class="user-info">
                <div class="user-avatar">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" 
                             alt="{{ auth()->user()->name }}">
                    @else
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    @endif
                </div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-name">{{ auth()->user()->role->name }}</div>
                </div>
    </div>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                
                      <div class="user-actions">
                <button class="btn-logout" onclick="window.location.href='home.html'">
                    <i class="fas fa-sign-out-alt"></i>
                    Keluar
                </button>
                </form>                
            </div>
        </div>
    </div>
    
    <div class="main-content">
        <!-- Dashboard Page -->
        <div class="page-content active" id="dashboard-page">
            <div class="page-header">
                <h1 class="page-title">Dashboard</h1>
            </div>
            
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="total-projects">12</h3>
                        <p>Total Projects</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="total-articles">24</h3>
                        <p>Total Articles</p>
                    </div>
                </div>
             
                
              
            </div>
            <div class="recent-activities">
                <h2 class="section-title">Recent Activities</h2>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div class="activity-details">
                            <p>New project "Renal Health Monitoring" created</p>
                            <span class="activity-time">2 hours ago</span>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-details">
                            <p>Article "Kidney Disease Prevention" updated</p>
                            <span class="activity-time">5 hours ago</span>
                        </div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-details">
                            <p>Project "Patient Education Portal" completed</p>
                            <span class="activity-time">Yesterday</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Artikel Page -->
        <div class="page-content" id="artikel-page">
            <div class="page-header">
                <h1 class="page-title">Artikel</h1>
                <button class="btn-new-item" id="btn-new-artikel">
                    <i class="fas fa-plus"></i>
                    New Artikel
                </button>
            </div>
            
            <!-- Search and Filter Tools -->
            <div class="page-tools">
                <div class="search-container">
                    <div class="search-box">
                        <input type="text" id="search-artikel" placeholder="Cari artikel...">
                        <button type="button" id="btn-search-artikel">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <div class="filter-container">
                    <select id="filter-tag" class="filter-select">
                        <option value="">Semua Fokus Isu</option>
                        <option value="kesehatan-reproduksi">Kesehatan Reproduksi</option>
                        <option value="kesehatan-mental">Kesehatan Mental</option>
                        <option value="perilaku-hidup-bersih">Perilaku Hidup Bersih & Sehat</option>
                        <option value="gizi-remaja">Gizi Remaja</option>
                    </select>
                    
                    <select id="sort-artikel" class="filter-select">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="title-asc">Judul A-Z</option>
                        <option value="title-desc">Judul Z-A</option>
                    </select>
                </div>
            </div>
            
            <div class="content-grid" id="artikel-grid">
                <!-- Artikel items will be dynamically added here -->
            </div>
        </div>
        
        <!-- Project Page -->
        <div class="page-content" id="project-page">
            <div class="page-header">
                <h1 class="page-title">Project</h1>
                <button class="btn-new-item" id="btn-new-project">
                    <i class="fas fa-plus"></i>
                    New Project
                </button>
            </div>
            
            <!-- Search Tool -->
            <div class="page-tools">
                <div class="search-container">
                    <div class="search-box">
                        <input type="text" id="search-project" placeholder="Cari proyek...">
                        <button type="button" id="btn-search-project">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <select id="sort-project" class="filter-select">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="title-asc">Judul A-Z</option>
                    <option value="title-desc">Judul Z-A</option>
                </select>
            </div>
            
            <div class="content-grid" id="project-grid">
                <!-- Project items will be dynamically added here -->
            </div>
        </div>
    </div>
    
    <!-- Modal Form for New Project/Artikel - IMPROVED -->
    <div class="modal" id="form-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modal-title">New Project</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="item-form">
                    <input type="hidden" id="edit-id">
                    <input type="hidden" id="item-type">
                    
                    <div class="form-group">
                        <label for="item-title">Judul</label>
                        <input type="text" id="item-title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="item-description">Deskripsi</label>
                        <textarea id="item-description" rows="4" placeholder="Masukkan deskripsi..."></textarea>
                    </div>
                    
                    <!-- Image Upload -->
                    <div class="form-group">
                        <label for="item-image">Gambar</label>
                        <div class="image-upload-container" id="image-upload-container">
                            <div class="image-upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="image-upload-text">
                                <p><strong>Klik untuk upload gambar</strong></p>
                                <p>atau drag & drop file disini</p>
                                <p>Format: JPG, PNG, GIF (max. 5MB)</p>
                            </div>
                            <input type="file" id="item-image" accept="image/*" style="display: none;">
                        </div>
                        <div class="image-preview" id="image-preview">
                            <img id="preview-image" src="" alt="Preview">
                            <button type="button" class="btn-remove-image" id="btn-remove-image">Hapus Gambar</button>
                        </div>
                    </div>
                    
                    <!-- Project Leader Field - Only for Project -->
                    <div class="form-group" id="project-leader-field">
                        <label for="item-project-leader">Project Leader</label>
                        <input type="text" id="item-project-leader" placeholder="Nama project leader">
                    </div>
                    
                    <!-- Tags Section - Only for Artikel -->
                    <div class="form-group" id="tags-field">
                        <label for="item-tags">Fokus Isu</label>
                        <div class="tags-input-container">
                            <div class="tag-option">
                                <input type="checkbox" id="tag-kesehatan-reproduksi" name="tags" value="kesehatan-reproduksi">
                                <label for="tag-kesehatan-reproduksi">Kesehatan Reproduksi</label>
                            </div>
                            <div class="tag-option">
                                <input type="checkbox" id="tag-kesehatan-mental" name="tags" value="kesehatan-mental">
                                <label for="tag-kesehatan-mental">Kesehatan Mental</label>
                            </div>
                            <div class="tag-option">
                                <input type="checkbox" id="tag-perilaku-hidup-bersih" name="tags" value="perilaku-hidup-bersih">
                                <label for="tag-perilaku-hidup-bersih">Perilaku Hidup Bersih & Sehat</label>
                            </div>
                            <div class="tag-option">
                                <input type="checkbox" id="tag-gizi-remaja" name="tags" value="gizi-remaja">
                                <label for="tag-gizi-remaja">Gizi Remaja</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Author and Uploader Section - Only for Artikel -->
                    <div class="form-group" id="author-field">
                        <label for="item-author">Penulis</label>
                        <input type="text" id="item-author" placeholder="Nama penulis">
                    </div>
                    
                    <div class="form-group" id="uploader-field">
                        <label for="item-uploader">Pengunggah</label>
                        <input type="text" id="item-uploader" placeholder="Nama pengunggah">
                    </div>
                    
                    <div class="form-group" id="date-field">
                        <label for="item-date">Tanggal</label>
                        <input type="date" id="item-date">
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-cancel">Cancel</button>
                        <button type="submit" class="btn-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Data storage
        let projects = [
            {
                id: 1,
                title: "Renal Health Monitoring",
                description: "Sistem monitoring kesehatan ginjal berbasis IoT dengan analisis data real-time untuk pasien penyakit ginjal kronis.",
                date: "2023-12-15",
                projectLeader: "Ulfi Sa'adah",
                image: null
            },
            {
                id: 2,
                title: "Emotion Analysis Tool",
                description: "Pengembangan alat analisis emosi pasien untuk membantu diagnosis dan penanganan gangguan psikosomatis terkait ginjal.",
                date: "2024-01-20",
                projectLeader: "Ahmad Fauzi",
                image: null
            }
        ];
        
        let articles = [
            {
                id: 1,
                title: "Pentingnya Kesehatan Reproduksi Remaja",
                description: "Panduan lengkap tentang pentingnya menjaga kesehatan reproduksi sejak dini bagi remaja.",
                date: "2023-10-05",
                tags: ["kesehatan-reproduksi", "kesehatan-mental"],
                author: "Dr. Sari Indah",
                uploader: "Ulfi Sa'adah",
                image: null
            },
            {
                id: 2,
                title: "Gizi Seimbang untuk Remaja Aktif",
                description: "Tips dan panduan gizi seimbang untuk mendukung aktivitas remaja yang padat.",
                date: "2023-09-18",
                tags: ["gizi-remaja", "perilaku-hidup-bersih"],
                author: "Nutrisionis Ahmad",
                uploader: "Ulfi Sa'adah",
                image: null
            }
        ];
        
        // DOM Elements
        const navItems = document.querySelectorAll('.nav-item');
        const pageContents = document.querySelectorAll('.page-content');
        const modal = document.getElementById('form-modal');
        const closeBtn = document.querySelector('.close');
        const cancelBtn = document.querySelector('.btn-cancel');
        const form = document.getElementById('item-form');
        const projectGrid = document.getElementById('project-grid');
        const artikelGrid = document.getElementById('artikel-grid');
        const btnNewProject = document.getElementById('btn-new-project');
        const btnNewArtikel = document.getElementById('btn-new-artikel');
        
        // Search and Filter Elements
        const searchArtikelInput = document.getElementById('search-artikel');
        const btnSearchArtikel = document.getElementById('btn-search-artikel');
        const filterTagSelect = document.getElementById('filter-tag');
        const sortArtikelSelect = document.getElementById('sort-artikel');
        const searchProjectInput = document.getElementById('search-project');
        const btnSearchProject = document.getElementById('btn-search-project');
        const sortProjectSelect = document.getElementById('sort-project');
        
        // Image Upload Elements
        const imageUploadContainer = document.getElementById('image-upload-container');
        const imageInput = document.getElementById('item-image');
        const imagePreview = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview-image');
        const btnRemoveImage = document.getElementById('btn-remove-image');
        
        // Current search and filter states
        let currentArtikelSearch = '';
        let currentArtikelTagFilter = '';
        let currentArtikelSort = 'newest';
        let currentProjectSearch = '';
        let currentProjectSort = 'newest';
        
        // Image data storage for current form
        let currentImageData = null;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            updateDashboardStats();
            renderProjects();
            renderArticles();
            
            // Navigation
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    const pageId = this.getAttribute('data-page');
                    
                    // Update active nav item
                    navItems.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show corresponding page
                    pageContents.forEach(page => page.classList.remove('active'));
                    document.getElementById(`${pageId}-page`).classList.add('active');
                });
            });
            
            // Modal events
            btnNewProject.addEventListener('click', () => openModal('project'));
            btnNewArtikel.addEventListener('click', () => openModal('artikel'));
            
            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);
            
            // Form submission
            form.addEventListener('submit', handleFormSubmit);
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });
            
            // Search and Filter Events
            btnSearchArtikel.addEventListener('click', () => {
                currentArtikelSearch = searchArtikelInput.value.toLowerCase();
                renderArticles();
            });
            
            searchArtikelInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    currentArtikelSearch = searchArtikelInput.value.toLowerCase();
                    renderArticles();
                }
            });
            
            filterTagSelect.addEventListener('change', () => {
                currentArtikelTagFilter = filterTagSelect.value;
                renderArticles();
            });
            
            sortArtikelSelect.addEventListener('change', () => {
                currentArtikelSort = sortArtikelSelect.value;
                renderArticles();
            });
            
            btnSearchProject.addEventListener('click', () => {
                currentProjectSearch = searchProjectInput.value.toLowerCase();
                renderProjects();
            });
            
            searchProjectInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') {
                    currentProjectSearch = searchProjectInput.value.toLowerCase();
                    renderProjects();
                }
            });
            
            sortProjectSelect.addEventListener('change', () => {
                currentProjectSort = sortProjectSelect.value;
                renderProjects();
            });
            
            // Image Upload Events
            imageUploadContainer.addEventListener('click', () => {
                imageInput.click();
            });
            
            imageInput.addEventListener('change', handleImageUpload);
            
            // Drag and drop for image upload
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                imageUploadContainer.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                imageUploadContainer.addEventListener(eventName, () => {
                    imageUploadContainer.classList.add('dragover');
                }, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                imageUploadContainer.addEventListener(eventName, () => {
                    imageUploadContainer.classList.remove('dragover');
                }, false);
            });
            
            imageUploadContainer.addEventListener('drop', handleDrop, false);
            
            btnRemoveImage.addEventListener('click', () => {
                currentImageData = null;
                imageInput.value = '';
                imagePreview.style.display = 'none';
                imageUploadContainer.style.display = 'block';
            });
        });
        
        // Handle image upload
        function handleImageUpload(e) {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                if (file.size > 5 * 1024 * 1024) {
                    alert('File terlalu besar. Maksimal 5MB.');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    currentImageData = e.target.result;
                    previewImage.src = currentImageData;
                    imagePreview.style.display = 'block';
                    imageUploadContainer.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }
        
        // Handle drop event for drag and drop
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File terlalu besar. Maksimal 5MB.');
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        currentImageData = e.target.result;
                        previewImage.src = currentImageData;
                        imagePreview.style.display = 'block';
                        imageUploadContainer.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
        
        // Update dashboard stats
        function updateDashboardStats() {
            document.getElementById('total-projects').textContent = projects.length;
            document.getElementById('total-articles').textContent = articles.length;
        }
        
        // Filter and sort articles
        function getFilteredAndSortedArticles() {
            let filtered = [...articles];
            
            // Apply search filter
            if (currentArtikelSearch) {
                filtered = filtered.filter(article => 
                    article.title.toLowerCase().includes(currentArtikelSearch) ||
                    article.description.toLowerCase().includes(currentArtikelSearch) ||
                    article.author.toLowerCase().includes(currentArtikelSearch)
                );
            }
            
            // Apply tag filter
            if (currentArtikelTagFilter) {
                filtered = filtered.filter(article => 
                    article.tags && article.tags.includes(currentArtikelTagFilter)
                );
            }
            
            // Apply sorting
            switch (currentArtikelSort) {
                case 'newest':
                    filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
                    break;
                case 'oldest':
                    filtered.sort((a, b) => new Date(a.date) - new Date(b.date));
                    break;
                case 'title-asc':
                    filtered.sort((a, b) => a.title.localeCompare(b.title));
                    break;
                case 'title-desc':
                    filtered.sort((a, b) => b.title.localeCompare(a.title));
                    break;
            }
            
            return filtered;
        }
        
        // Filter and sort projects
        function getFilteredAndSortedProjects() {
            let filtered = [...projects];
            
            // Apply search filter
            if (currentProjectSearch) {
                filtered = filtered.filter(project => 
                    project.title.toLowerCase().includes(currentProjectSearch) ||
                    project.description.toLowerCase().includes(currentProjectSearch) ||
                    project.projectLeader.toLowerCase().includes(currentProjectSearch)
                );
            }
            
            // Apply sorting
            switch (currentProjectSort) {
                case 'newest':
                    filtered.sort((a, b) => new Date(b.date) - new Date(a.date));
                    break;
                case 'oldest':
                    filtered.sort((a, b) => new Date(a.date) - new Date(b.date));
                    break;
                case 'title-asc':
                    filtered.sort((a, b) => a.title.localeCompare(b.title));
                    break;
                case 'title-desc':
                    filtered.sort((a, b) => b.title.localeCompare(a.title));
                    break;
            }
            
            return filtered;
        }
        
        // Render projects
        function renderProjects() {
            projectGrid.innerHTML = '';
            
            const filteredProjects = getFilteredAndSortedProjects();
            
            if (filteredProjects.length === 0) {
                projectGrid.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <p>Tidak ada proyek yang ditemukan</p>
                    </div>
                `;
                return;
            }
            
            filteredProjects.forEach(project => {
                const projectCard = document.createElement('div');
                projectCard.className = 'content-card';
                projectCard.innerHTML = `
                    ${project.image ? `
                    <div class="content-image">
                        <img src="${project.image}" alt="${project.title}">
                    </div>
                    ` : ''}
                    <div class="content-body">
                        <div class="content-header">
                            <div>
                                <h3 class="content-title">${project.title}</h3>
                                <span class="content-id">ID: ${project.id.toString().padStart(3, '0')}</span>
                            </div>
                        </div>
                        <p class="content-description">${project.description}</p>
                        <div class="author-info">
                            <div class="author-item">
                                <span class="author-label">Project Leader</span>
                                <span class="author-name">${project.projectLeader || '-'}</span>
                            </div>
                        </div>
                        <div class="content-meta">
                            <div class="content-date">
                                <i class="far fa-calendar-alt"></i>
                                Due: ${formatDate(project.date)}
                            </div>
                        </div>
                        <div class="content-actions">
                            <button class="btn-edit" data-id="${project.id}" data-type="project">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn-delete" data-id="${project.id}" data-type="project">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                `;
                projectGrid.appendChild(projectCard);
            });
            
            // Add event listeners to action buttons
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const type = this.getAttribute('data-type');
                    editItem(id, type);
                });
            });
            
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const type = this.getAttribute('data-type');
                    deleteItem(id, type);
                });
            });
        }
        
        // Render articles
        function renderArticles() {
            artikelGrid.innerHTML = '';
            
            const filteredArticles = getFilteredAndSortedArticles();
            
            if (filteredArticles.length === 0) {
                artikelGrid.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <p>Tidak ada artikel yang ditemukan</p>
                    </div>
                `;
                return;
            }
            
            filteredArticles.forEach(article => {
                const articleCard = document.createElement('div');
                articleCard.className = 'content-card';
                
                // Generate tags HTML
                let tagsHTML = '';
                if (article.tags && article.tags.length > 0) {
                    tagsHTML = '<div class="tags-container">';
                    article.tags.forEach(tag => {
                        tagsHTML += `<span class="tag tag-${tag}">${getTagDisplayName(tag)}</span>`;
                    });
                    tagsHTML += '</div>';
                }
                
                articleCard.innerHTML = `
                    ${article.image ? `
                    <div class="content-image">
                        <img src="${article.image}" alt="${article.title}">
                    </div>
                    ` : ''}
                    <div class="content-body">
                        <div class="content-header">
                            <div>
                                <h3 class="content-title">${article.title}</h3>
                                <span class="content-id">ID: ${article.id.toString().padStart(3, '0')}</span>
                            </div>
                        </div>
                        <p class="content-description">${article.description}</p>
                        ${tagsHTML}
                        <div class="author-info">
                            <div class="author-item">
                                <span class="author-label">Penulis</span>
                                <span class="author-name">${article.author || '-'}</span>
                            </div>
                            <div class="author-item">
                                <span class="author-label">Pengunggah</span>
                                <span class="author-name">${article.uploader || '-'}</span>
                            </div>
                        </div>
                        <div class="content-meta">
                            <div class="content-date">
                                <i class="far fa-calendar-alt"></i>
                                Published: ${formatDate(article.date)}
                            </div>
                        </div>
                        <div class="content-actions">
                            <button class="btn-edit" data-id="${article.id}" data-type="artikel">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn-delete" data-id="${article.id}" data-type="artikel">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                `;
                artikelGrid.appendChild(articleCard);
            });
            
            // Add event listeners to action buttons
            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const type = this.getAttribute('data-type');
                    editItem(id, type);
                });
            });
            
            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const type = this.getAttribute('data-type');
                    deleteItem(id, type);
                });
            });
        }
        
        // Get tag display name
        function getTagDisplayName(tag) {
            const tagNames = {
                'kesehatan-reproduksi': 'Kesehatan Reproduksi',
                'kesehatan-mental': 'Kesehatan Mental',
                'perilaku-hidup-bersih': 'Perilaku Hidup Bersih & Sehat',
                'gizi-remaja': 'Gizi Remaja'
            };
            return tagNames[tag] || tag;
        }
        
        // Open modal for new item or edit
        function openModal(type, id = null) {
            const modalTitle = document.getElementById('modal-title');
            const itemType = document.getElementById('item-type');
            const dateField = document.getElementById('date-field');
            const tagsField = document.getElementById('tags-field');
            const authorField = document.getElementById('author-field');
            const uploaderField = document.getElementById('uploader-field');
            const projectLeaderField = document.getElementById('project-leader-field');
            
            // Reset image upload
            currentImageData = null;
            imagePreview.style.display = 'none';
            imageUploadContainer.style.display = 'block';
            imageInput.value = '';
            
            // Set modal title and type
            if (id) {
                modalTitle.textContent = `Edit ${type === 'project' ? 'Project' : 'Artikel'}`;
            } else {
                modalTitle.textContent = `New ${type === 'project' ? 'Project' : 'Artikel'}`;
            }
            
            itemType.value = type;
            
            // Show/hide fields based on type
            if (type === 'project') {
                dateField.style.display = 'block';
                tagsField.style.display = 'none';
                authorField.style.display = 'none';
                uploaderField.style.display = 'none';
                projectLeaderField.style.display = 'block';
            } else {
                dateField.style.display = 'block';
                tagsField.style.display = 'block';
                authorField.style.display = 'block';
                uploaderField.style.display = 'block';
                projectLeaderField.style.display = 'none';
            }
            
            // If editing, populate form with existing data
            if (id) {
                const item = type === 'project' 
                    ? projects.find(p => p.id == id) 
                    : articles.find(a => a.id == id);
                
                document.getElementById('edit-id').value = id;
                document.getElementById('item-title').value = item.title;
                document.getElementById('item-description').value = item.description;
                
                // Set image if exists
                if (item.image) {
                    currentImageData = item.image;
                    previewImage.src = item.image;
                    imagePreview.style.display = 'block';
                    imageUploadContainer.style.display = 'none';
                }
                
                if (type === 'project') {
                    document.getElementById('item-date').value = item.date;
                    document.getElementById('item-project-leader').value = item.projectLeader || '';
                } else {
                    document.getElementById('item-date').value = item.date;
                    document.getElementById('item-author').value = item.author || '';
                    document.getElementById('item-uploader').value = item.uploader || '';
                    
                    // Clear all tag checkboxes first
                    document.querySelectorAll('input[name="tags"]').forEach(checkbox => {
                        checkbox.checked = false;
                    });
                    
                    // Check the tags that are selected
                    if (item.tags && item.tags.length > 0) {
                        item.tags.forEach(tag => {
                            const checkbox = document.getElementById(`tag-${tag}`);
                            if (checkbox) {
                                checkbox.checked = true;
                            }
                        });
                    }
                }
            } else {
                // Reset form for new item
                form.reset();
                document.getElementById('edit-id').value = '';
                
                // Set default values
                if (type === 'project') {
                    document.getElementById('item-project-leader').value = 'Ulfi Sa\'adah';
                    
                    // Set default date to 30 days from now
                    const defaultDate = new Date();
                    defaultDate.setDate(defaultDate.getDate() + 30);
                    document.getElementById('item-date').value = defaultDate.toISOString().split('T')[0];
                } else {
                    // Set default date to today for articles
                    document.getElementById('item-date').value = new Date().toISOString().split('T')[0];
                    document.getElementById('item-uploader').value = 'Ulfi Sa\'adah';
                }
            }
            
            modal.style.display = 'block';
        }
        
        // Close modal
        function closeModal() {
            modal.style.display = 'none';
            currentImageData = null;
        }
        
        // Handle form submission
        function handleFormSubmit(e) {
            e.preventDefault();
            
            const id = document.getElementById('edit-id').value;
            const type = document.getElementById('item-type').value;
            const title = document.getElementById('item-title').value;
            const description = document.getElementById('item-description').value;
            const date = document.getElementById('item-date').value;
            
            if (type === 'project') {
                const projectLeader = document.getElementById('item-project-leader').value;
                
                if (id) {
                    // Update existing project
                    const index = projects.findIndex(p => p.id == id);
                    projects[index] = {
                        id: parseInt(id),
                        title,
                        description,
                        date,
                        projectLeader,
                        image: currentImageData || projects[index].image
                    };
                } else {
                    // Add new project
                    const newId = projects.length > 0 ? Math.max(...projects.map(p => p.id)) + 1 : 1;
                    projects.push({
                        id: newId,
                        title,
                        description,
                        date,
                        projectLeader,
                        image: currentImageData
                    });
                }
                
                renderProjects();
            } else {
                // Handle artikel
                const author = document.getElementById('item-author').value;
                const uploader = document.getElementById('item-uploader').value;
                
                // Get selected tags
                const selectedTags = [];
                document.querySelectorAll('input[name="tags"]:checked').forEach(checkbox => {
                    selectedTags.push(checkbox.value);
                });
                
                if (id) {
                    // Update existing artikel
                    const index = articles.findIndex(a => a.id == id);
                    articles[index] = {
                        id: parseInt(id),
                        title,
                        description,
                        date,
                        tags: selectedTags,
                        author,
                        uploader,
                        image: currentImageData || articles[index].image
                    };
                } else {
                    // Add new artikel
                    const newId = articles.length > 0 ? Math.max(...articles.map(a => a.id)) + 1 : 1;
                    articles.push({
                        id: newId,
                        title,
                        description,
                        date,
                        tags: selectedTags,
                        author,
                        uploader,
                        image: currentImageData
                    });
                }
                
                renderArticles();
            }
            
            updateDashboardStats();
            closeModal();
        }
        
        // Edit item
        function editItem(id, type) {
            openModal(type, id);
        }
        
        // Delete item
        function deleteItem(id, type) {
            if (confirm(`Are you sure you want to delete this ${type}?`)) {
                if (type === 'project') {
                    projects = projects.filter(p => p.id != id);
                    renderProjects();
                } else {
                    articles = articles.filter(a => a.id != id);
                    renderArticles();
                }
                updateDashboardStats();
            }
        }
        
        // Format date for display
        function formatDate(dateString) {
            const options = { day: 'numeric', month: 'short', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        }
    </script>
</body>
</html>