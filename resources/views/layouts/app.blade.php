<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>News Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .navbar {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.04);
}

.navbar .nav-link {
    font-weight: 500;
    position: relative;
    transition: color 0.3s ease;
}

.navbar .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background-color: var(--bs-primary);
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.navbar .nav-link:hover::after,
.navbar .nav-link.active::after {
    width: 80%;
}

.navbar .nav-link.active {
    color: var(--bs-primary);
}

/* Categories Nav */
.categories-nav {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.categories-nav::-webkit-scrollbar {
    display: none;
}

/* Weather Widget */
.weather-widget {
    background-color: #f8f9fa;
    font-weight: 500;
}

/* Search Toggle */
.search-toggle {
    width: 40px;
    height: 40px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Top Bar Hover Effects */
.top-bar a {
    opacity: 0.9;
    transition: opacity 0.3s ease;
}

.top-bar a:hover {
    opacity: 1;
}

@media (max-width: 991.98px) {
    .navbar {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .categories-nav {
        margin: 1rem 0;
        padding: 1rem 0;
        border-top: 1px solid rgba(0,0,0,0.1);
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
}
.footer {
    background-color: #1a1a1a;
}

.newsletter-section {
    background: linear-gradient(45deg, var(--bs-primary), #0d47a1);
}

.icon-box {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--bs-primary);
}

.recent-news-item {
    transition: transform 0.3s ease;
}

.recent-news-item:hover {
    transform: translateX(5px);
}

.footer-link {
    color: #ffffff;
    opacity: 0.7;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
}

.footer-link:hover {
    color: var(--bs-primary);
    opacity: 1;
    transform: translateX(5px);
}

.gallery-item {
    position: relative;
    overflow: hidden;
}

.gallery-item img {
    transition: transform 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.bottom-bar {
    background-color: rgba(255, 255, 255, 0.05);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.social-links {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.social-link {
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: var(--bs-primary);
    color: white;
    transform: translateY(-3px);
}

.hover-primary:hover {
    color: var(--bs-primary) !important;
}

@media (max-width: 767.98px) {
    .social-links {
        justify-content: center;
    }
}
    </style>
</head>

<body>
    <!-- Trending Bar -->


    <!-- Navbar -->
    <div class="top-bar py-2 bg-primary text-white d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <i class="bi bi-clock me-2"></i>
                            <span id="currentTime"></span>
                        </div>
                        <div>
                            <i class="bi bi-calendar3 me-2"></i>
                            <span id="currentDate"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-end gap-3">
                        <a href="#" class="text-white text-decoration-none">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand me-4" href="{{ route('index') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 45px;">
            </a>
    
            <!-- Mobile Buttons -->
            <div class="d-flex align-items-center gap-3 d-lg-none">
                <button type="button" 
                        class="search-toggle btn btn-light btn-sm rounded-circle"
                        data-bs-toggle="modal" 
                        data-bs-target="#searchModal">
                    <i class="bi bi-search"></i>
                </button>
                <button class="navbar-toggler border-0" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#mainNav">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>
    
            <!-- Main Navigation -->
            <div class="collapse navbar-collapse" id="mainNav">
                <div class="mx-lg-auto order-lg-1">
                    <ul class="navbar-nav categories-nav">
                        @foreach (\App\Models\Category::all() as $categories)
                            <li class="nav-item mx-1">
                                <a href="{{ route('news.viewCategory', $categories->id) }}"
                                   class="nav-link px-3 {{ Request::segment(2) == $categories->id ? 'active' : '' }}">
                                    {{ $categories->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
    
                <!-- Search & Weather -->
                <div class="d-none d-lg-flex align-items-center gap-3 order-lg-2">
                    <div class="weather-widget px-3 py-2 rounded-3 d-flex align-items-center">
                        <i class="bi bi-cloud-sun fs-5 me-2"></i>
                        <span>28°C</span>
                    </div>
                    <button type="button" 
                            class="search-toggle btn btn-primary rounded-circle"
                            data-bs-toggle="modal" 
                            data-bs-target="#searchModal">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content search-modal">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-4">
                        <i class="bi bi-search text-primary me-2"></i>
                        Search Articles
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="input-group input-group-lg">
                                    <input type="search" 
                                           class="form-control" 
                                           placeholder="Type to search..." 
                                           aria-label="Search">
                                    <button class="btn btn-primary px-4">
                                        <i class="bi bi-search me-2"></i>
                                        Search
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <h6 class="text-muted mb-3">Popular Searches:</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach (\App\Models\Category::orderBy('views', 'desc')->take(5)->get() as $category)
                                            <a href="{{ route('news.viewCategory', $category->id) }}" 
                                               class="badge bg-light text-dark text-decoration-none">
                                                {{ $category->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer class="footer">
        <!-- Newsletter Section -->
        
    
        <!-- Main Footer -->
        <div class="main-footer py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Company Info -->
                    <div class="col-lg-4 pe-lg-5">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="footer-logo mb-4" style="height: 45px;">
                        <p class="text-white-50 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni praesentium soluta quos voluptates natus officiis ullam libero laboriosam suscipit culpa, voluptate ad laudantium eius explicabo voluptatum commodi quod ea qui.</p>
                        <div class="contact-info">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-white mb-0">Pasuruan, Indonesia</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-white mb-0">walawe@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="text-white mb-0">+62</p>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Recent News -->
                    <div class="col-lg-4">
                        <h5 class="text-white mb-4">Latest Updates</h5>
                        @foreach (\App\Models\News::where('status', 'Accept')->orderBy('created_at', 'desc')->take(2)->get() as $news)
                            <div class="recent-news-item mb-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                             class="rounded-3" 
                                             alt=""
                                             width="100" 
                                             height="100"
                                             style="object-fit: cover;" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <span class="badge bg-primary mb-2">{{ $news->category->name }}</span>
                                        <h6 class="mb-2">
                                            <a href="{{ route('news.show', $news->id) }}" 
                                               class="text-white text-decoration-none hover-primary">
                                                {{ Str::limit($news->title, 50) }}
                                            </a>
                                        </h6>
                                        <div class="d-flex align-items-center text-white-50">
                                            <i class="bi bi-calendar3 me-2"></i>
                                            <small>{{ $news->created_at->translatedFormat('j F Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
    
                    <!-- Quick Links -->
                    <div class="col-lg-4">
                        <div class="row">
                            <!-- Categories -->
                            <div class="col-sm-6 mb-4 mb-sm-0">
                                <h5 class="text-white mb-4">Categories</h5>
                                <div class="d-flex flex-column gap-2">
                                    @foreach (\App\Models\Category::orderBy('views', 'desc')->take(6)->get() as $categories)
                                        <a href="{{ route('news.viewCategory', $categories->id) }}" 
                                           class="footer-link">
                                            <i class="bi bi-chevron-right me-2"></i>
                                            {{ $categories->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Gallery -->
                            <div class="col-sm-6">
                                <h5 class="text-white mb-4">Gallery</h5>
                                <div class="row g-2">
                                    @for ($i = 1; $i <= 6; $i++)
                                        <div class="col-4">
                                            <div class="gallery-item rounded-3 overflow-hidden">
                                                <img src="{{ asset('img/pict' . $i . '.jpeg') }}"
                                                     class="img-fluid w-100" 
                                                     alt=""
                                                     style="aspect-ratio: 1; object-fit: cover;" />
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- Bottom Bar -->
        <div class="bottom-bar py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright text-white-50">
                            © 2024 <span class="text-white">walawe</span>. All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="social-links">
                            <a href="#" class="social-link">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
      
    </footer>

  

    <!-- Back to Top -->
   

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Back to Top Button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.querySelector('.back-to-top').style.display = "block";
            } else {
                document.querySelector('.back-to-top').style.display = "none";
            }
        }

        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({top: 0, behavior: 'smooth'});
        });
    </script>
</body>
</html>