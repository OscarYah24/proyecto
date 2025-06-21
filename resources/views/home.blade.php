<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PSD Mockups - Design Resources</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #6c757d;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --success-color: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
        }

        /* Header promocional */
        .promo-header {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 12px 0;
            font-size: 14px;
        }

        .promo-header .placeit {
            color: #ffc107;
            font-weight: 600;
        }

        /* Navegación principal */
        .main-navbar {
            background-color: #343a40 !important;
            padding: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            padding: 1rem 1.5rem !important;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: rgba(40, 167, 69, 0.1);
            border-bottom-color: var(--success-color);
        }

        /* Sección de búsqueda */
        .search-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        .search-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .search-input-group {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 50px;
            overflow: hidden;
            background: white;
        }

        .search-input-group .form-control {
            border: none;
            padding: 15px 25px;
            font-size: 16px;
            box-shadow: none;
        }

        .search-input-group .form-control:focus {
            box-shadow: none;
            border-color: transparent;
        }

        .search-input-group .form-select {
            border: none;
            border-left: 1px solid #dee2e6;
            border-right: 1px solid #dee2e6;
            padding: 15px 20px;
            background-color: #f8f9fa;
        }

        .search-btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            padding: 15px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, #218838, #1ea085);
            transform: translateY(-2px);
        }

        /* Indicador de categoría */
        .category-indicator {
            text-align: center;
            margin: 30px 0;
            color: #6c757d;
            font-size: 14px;
        }

        /* Grid de mockups */
        .mockups-grid {
            padding: 40px 0;
        }

        .mockup-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
        }

        .mockup-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .mockup-image {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .mockup-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .mockup-card:hover .mockup-image img {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(40, 167, 69, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mockup-card:hover .image-overlay {
            opacity: 1;
        }

        .view-btn {
            background: white;
            color: var(--success-color);
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .view-btn:hover {
            background: var(--success-color);
            color: white;
            transform: scale(1.05);
        }

        /* Tags */
        .tag {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
            margin: 2px;
            text-transform: uppercase;
        }

        .tag-food { background-color: #28a745; color: white; }
        .tag-packaging { background-color: #17a2b8; color: white; }
        .tag-iphone { background-color: #007bff; color: white; }
        .tag-laptop { background-color: #ffc107; color: #333; }
        .tag-macbook { background-color: #6c757d; color: white; }
        .tag-mugs { background-color: #dc3545; color: white; }
        .tag-workspace { background-color: #6f42c1; color: white; }
        .tag-office { background-color: #20c997; color: white; }
        .tag-modern { background-color: #fd7e14; color: white; }
        .tag-coffee { background-color: #795548; color: white; }
        .tag-branding { background-color: #e91e63; color: white; }
        .tag-mobile { background-color: #00bcd4; color: white; }
        .tag-app { background-color: #9c27b0; color: white; }
        .tag-innovation { background-color: #ff5722; color: white; }
        .tag-default { background-color: #e9ecef; color: #495057; }

        /* Card content */
        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            line-height: 1.4;
            color: #2c3e50;
        }

        .card-text {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
            margin-top: auto;
        }

        .card-date {
            color: #adb5bd;
            font-size: 12px;
        }

        .card-actions .btn {
            border: none;
            background: none;
            color: #6c757d;
            padding: 5px;
            margin-left: 5px;
            transition: color 0.3s ease;
        }

        .card-actions .btn:hover {
            color: var(--success-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .search-section {
                padding: 40px 0;
            }

            .search-input-group {
                flex-direction: column;
                border-radius: 15px;
            }

            .search-input-group .form-control,
            .search-input-group .form-select,
            .search-btn {
                border-radius: 0;
                border: none;
            }

            .search-input-group .form-select {
                border-top: 1px solid #dee2e6;
                border-bottom: 1px solid #dee2e6;
            }

            .navbar-nav {
                background-color: rgba(52, 58, 64, 0.95);
                margin-top: 10px;
                border-radius: 10px;
            }

            .mockup-card {
                margin-bottom: 30px;
            }

            .card-title {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .promo-header {
                text-align: center;
                padding: 15px 0;
            }

            .promo-header .btn {
                margin-top: 10px;
                display: block;
                width: auto;
            }

            .mockup-image {
                height: 200px;
            }

            .card-body {
                padding: 20px;
            }
        }
        

        

        /* Animaciones */
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Estados de carga */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 30px;
            height: 30px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--success-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header Promocional -->
    <div class="promo-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <span>Need something else? Access over 30,000+ Commercial Mockups with </span>
                    <span class="placeit">Placeit</span>
                    <small class="ms-1">by envato</small>
                </div>
                <div class="col-lg-4 col-md-5 text-end">
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm fw-bold mt-2 mt-md-0">
    <i class="fas fa-sign-in-alt me-1"></i>Iniciar Sesión
</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navegación Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark main-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('mockups.home') }}">
                <i class="fas fa-cube me-2"></i>PSD MOCKUPS
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ $category === 'DESIGN' ? 'active' : '' }}" href="{{ route('design') }}">DESIGN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $category === 'RESOURCES' ? 'active' : '' }}" href="{{ route('resources') }}">RESOURCES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $category === 'PROTOTYPING' ? 'active' : '' }}" href="{{ route('prototyping') }}">PROTOTYPING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $category === 'CODE' ? 'active' : '' }}" href="{{ route('code') }}">CODE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $category === 'UX' ? 'active' : '' }}" href="{{ route('ux') }}">UX</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Búsqueda -->
    <section class="search-section">
        <div class="container">
            <div class="search-container">
                <form action="{{ route('search') }}" method="GET" id="searchForm">
                    <div class="input-group search-input-group">
                        <input type="text" 
                               class="form-control" 
                               placeholder="Search..." 
                               name="query"
                               value="{{ $searchQuery ?? '' }}"
                               id="searchInput">
                        
                        <select class="form-select" name="category" id="categorySelect">
                            <option value="DESIGN" {{ ($category ?? 'DESIGN') === 'DESIGN' ? 'selected' : '' }}>DESIGN</option>
                            <option value="RESOURCES" {{ ($category ?? '') === 'RESOURCES' ? 'selected' : '' }}>RESOURCES</option>
                            <option value="PROTOTYPING" {{ ($category ?? '') === 'PROTOTYPING' ? 'selected' : '' }}>PROTOTYPING</option>
                            <option value="CODE" {{ ($category ?? '') === 'CODE' ? 'selected' : '' }}>CODE</option>
                            <option value="UX" {{ ($category ?? '') === 'UX' ? 'selected' : '' }}>UX</option>
                        </select>
                        
                        <button class="btn search-btn" type="submit">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Indicador de Categoría -->
    <div class="category-indicator">
        <div class="container">
            Displaying category "<strong>{{ $category }}</strong>"
        </div>
    </div>

    <!-- Grid de Mockups -->
    <section class="mockups-grid">
        <div class="container">
            <div class="row g-4" id="mockupsGrid">
                @foreach($mockups as $index => $mockup)
                <div class="col-lg-4 col-md-6 fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="card mockup-card h-100">
                        <div class="mockup-image">
                            <img src="{{ $mockup['image'] }}" alt="{{ $mockup['title'] }}" loading="lazy">
                            <div class="image-overlay">
                                <a href="#" class="view-btn">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                            </div>
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <div class="mb-3">
                                @foreach($mockup['tags'] as $tag)
                                <span class="tag tag-{{ strtolower($tag) }}">{{ $tag }}</span>
                                @endforeach
                            </div>
                            
                            <h5 class="card-title">{{ $mockup['title'] }}</h5>
                            
                            <p class="card-text">{{ $mockup['description'] }}</p>
                            
                            <div class="card-meta">
                                <span class="card-date">
                                    <i class="fas fa-clock me-1"></i>{{ $mockup['created_at'] }}
                                </span>
                                <div class="card-actions">
                                    <button class="btn" title="Add to favorites">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="btn" title="Share">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if(empty($mockups))
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No mockups found</h4>
                <p class="text-muted">Try adjusting your search criteria</p>
                <a href="{{ route('mockups.home') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left me-2"></i>Back to All Mockups
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Modal de Búsqueda (Móvil) -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Search Mockups</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="query" placeholder="Search mockups...">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="category">
                                <option value="DESIGN">Design</option>
                                <option value="RESOURCES">Resources</option>
                                <option value="PROTOTYPING">Prototyping</option>
                                <option value="CODE">Code</option>
                                <option value="UX">UX</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript personalizado -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Funcionalidad de favoritos
            document.querySelectorAll('.fa-heart').forEach(heart => {
                heart.parentElement.addEventListener('click', function(e) {
                    e.preventDefault();
                    heart.classList.toggle('far');
                    heart.classList.toggle('fas');
                    heart.style.color = heart.classList.contains('fas') ? '#dc3545' : '';
                    
                    // Efecto de animación
                    heart.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        heart.style.transform = 'scale(1)';
                    }, 200);
                });
            });

            // Loading state para formularios
            document.getElementById('searchForm').addEventListener('submit', function() {
                const submitBtn = this.querySelector('.search-btn');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Searching...';
                submitBtn.disabled = true;
                
                // Restaurar el botón después de un tiempo si no se redirige
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 3000);
            });
            let searchTimeout;
            document.getElementById('searchInput').addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                
                if (query.length > 2) {
                    searchTimeout = setTimeout(() => {
                        // Aquí podrías implementar búsqueda AJAX en tiempo real
                        console.log('Searching for:', query);
                    }, 500);
                }
            });

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.style.opacity = '0';
                        img.onload = () => {
                            img.style.transition = 'opacity 0.3s ease';
                            img.style.opacity = '1';
                        };
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('.mockup-image img').forEach(img => {
                imageObserver.observe(img);
            });

            document.querySelectorAll('.mockup-card').forEach(card => {
                card.setAttribute('tabindex', '0');
                card.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        const viewBtn = this.querySelector('.view-btn');
                        if (viewBtn) viewBtn.click();
                    }
                });
            });

            // Scroll suave al hacer clic en navegación
            document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                        bsCollapse.hide();
                    }
                });
            });

            const resultCount = document.querySelectorAll('.mockup-card').length;
            if (resultCount > 0) {
                const counter = document.createElement('div');
                counter.className = 'text-center mb-4';
                counter.innerHTML = `<small class="text-muted">Showing <strong>${resultCount}</strong> results</small>`;
                
                const grid = document.getElementById('mockupsGrid');
                grid.parentNode.insertBefore(counter, grid);
            }

            // Efecto parallax sutil en el header
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelector('.search-section');
                const speed = 0.5;
                
                if (parallax) {
                    parallax.style.transform = `translateY(${scrolled * speed}px)`;
                }
            });

            // Preloader para las tarjetas
            document.querySelectorAll('.mockup-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Función para manejar el redimensionamiento de ventana
        window.addEventListener('resize', function() {
            // Ajustar el grid en dispositivos móviles
            const cards = document.querySelectorAll('.mockup-card');
            const isMobile = window.innerWidth < 768;
            
            cards.forEach(card => {
                if (isMobile) {
                    card.style.marginBottom = '20px';
                } else {
                    card.style.marginBottom = '0';
                }
            });
        });

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('SW registered: ', registration);
                    })
                    .catch(function(registrationError) {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    </script>
</body>
</html>

