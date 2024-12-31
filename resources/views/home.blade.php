@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Featured Post -->
            <div class="col-lg-8">
                @foreach ($latestNews->take(1) as $news)
                <div class="position-relative rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                         class="img-fluid w-100" 
                         alt="" 
                         style="height: 600px; object-fit: cover;" />
                    
                    <div class="position-absolute bottom-0 start-0 w-100 p-4" 
                         style="background: linear-gradient(0deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);">
                        <div class="d-flex gap-3 text-white mb-2">
                            <span><i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('d F Y') }}</span>
                            <span><i class="bi bi-eye me-1"></i>{{ $news->views }}</span>
                            <span><i class="bi bi-heart me-1"></i>{{ $news->likes->count() }}</span>
                        </div>
                        <h1 class="text-white mb-3">
                            <a href="{{ route('news.show', $news->id) }}" 
                               class="text-white text-decoration-none hover-opacity">
                                {{ $news->title }}
                            </a>
                        </h1>
                        <p class="text-white-50 mb-0 d-none d-md-block">
                            {!! Str::limit($news->content, 200, '...') !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Sidebar News -->
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-4">
                    @foreach ($latestNews->skip(1)->take(2) as $news)
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden">
                        <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                             class="card-img-top" 
                             alt="" 
                             style="height: 240px; object-fit: cover;" />
                        <div class="card-body">
                            <div class="d-flex gap-2 text-muted small mb-2">
                                <span><i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('d F Y') }}</span>
                                <span><i class="bi bi-eye me-1"></i>{{ $news->views }}</span>
                            </div>
                            <h5 class="card-title">
                                <a href="{{ route('news.show', $news->id) }}" 
                                   class="text-dark text-decoration-none hover-primary">
                                    {{ $news->title }}
                                </a>
                            </h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popular Section -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="mb-0">Popular Stories</h2>
            <a href="#" class="btn btn-outline-primary rounded-pill px-4">View All</a>
        </div>
        
        <div class="row g-4">
            @foreach ($popularNews->take(4) as $news)
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                         class="card-img-top rounded-top-4" 
                         alt="" 
                         style="height: 200px; object-fit: cover;" />
                    <div class="card-body">
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <span><i class="bi bi-eye me-1"></i>{{ $news->views }}</span>
                            <span><i class="bi bi-heart me-1"></i>{{ $news->likes->count() }}</span>
                        </div>
                        <h5 class="card-title">
                            <a href="{{ route('news.show', $news->id) }}" 
                               class="text-dark text-decoration-none hover-primary">
                                {{ Str::limit($news->title, 60) }}
                            </a>
                        </h5>
                        <p class="card-text text-muted small mb-0">
                            {{ $news->created_at->translatedFormat('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Category Tabs -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Category Navigation -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                    <h2 class="mb-0">Trending</h2>
                    <div class="nav nav-pills ms-auto">
                        @foreach ($topCategory->take(3) as $key => $categories)
                        <button class="nav-link rounded-pill px-4 {{ $key === 0 ? 'active' : '' }}"
                                data-bs-toggle="pill"
                                data-bs-target="#tab-{{ $key + 1 }}">
                            {{ $categories->name }}
                        </button>
                        @endforeach
                    </div>
                </div>

                <!-- Category Content -->
                <div class="tab-content">
                    @foreach ($topCategory->take(3) as $key => $categories)
                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" 
                         id="tab-{{ $key + 1 }}">
                        <div class="row g-4">
                            @foreach ($categories->news()->where('status', 'Accept')
                                     ->withCount('likes')
                                     ->orderBy('likes_count', 'desc')
                                     ->take(4)
                                     ->get() as $news)
                            <div class="col-md-6">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                         class="card-img-top rounded-top-4" 
                                         alt="" 
                                         style="height: 240px; object-fit: cover;" />
                                    <div class="card-body">
                                        <span class="badge bg-primary mb-2">{{ $categories->name }}</span>
                                        <h5 class="card-title">
                                            <a href="{{ route('news.show', $news->id) }}" 
                                               class="text-dark text-decoration-none hover-primary">
                                                {{ $news->title }}
                                            </a>
                                        </h5>
                                        <div class="d-flex gap-3 text-muted small">
                                            <span><i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('d F Y') }}</span>
                                            <span><i class="bi bi-eye me-1"></i>{{ $news->views }}</span>
                                            <span><i class="bi bi-heart me-1"></i>{{ $news->likes->count() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-body">
                        @component('components.col-2')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest News Carousel -->
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="mb-0">Latest Updates</h2>
            <div class="carousel-controls">
                <button class="btn btn-primary btn-sm rounded-circle me-2" id="prevBtn">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-primary btn-sm rounded-circle" id="nextBtn">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
        
        <div class="owl-carousel">
            @foreach ($latestNews->take(6) as $news)
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                     class="card-img-top rounded-top-4" 
                     alt="" 
                     style="height: 200px; object-fit: cover;" />
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('news.show', $news->id) }}" 
                           class="text-dark text-decoration-none hover-primary">
                            {{ Str::limit($news->title, 50) }}
                        </a>
                    </h5>
                    <div class="d-flex justify-content-between text-muted small">
                        <span>by {{ $news->author->name }}</span>
                        <span><i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('j F Y') }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.hover-primary:hover {
    color: var(--bs-primary) !important;
}

.hover-opacity:hover {
    opacity: 0.9;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.nav-pills .nav-link {
    color: var(--bs-dark);
}

.nav-pills .nav-link.active {
    background-color: var(--bs-primary);
    color: white;
}

.owl-carousel .card {
    margin: 10px;
}
</style>

@endsection