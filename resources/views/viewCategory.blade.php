@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="container-fluid py-5">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    @foreach ($latestNews->take(1) as $news)
                        <div class="position-relative overflow-hidden rounded-4 shadow-sm">
                            <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                class="img-fluid w-100" alt="" style="height: 500px; object-fit: cover;" />
                            <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-gradient">
                                <div class="d-flex gap-4 text-white mb-2">
                                    <div><i class="bi bi-calendar3 me-2"></i>{{ $news->created_at->translatedFormat('d F Y') }}</div>
                                    <div><i class="bi bi-eye me-2"></i>{{ number_format($news->views) }}</div>
                                    <div><i class="bi bi-heart me-2"></i>{{ number_format($news->likes->count()) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 border-bottom">
                            <a href="{{ route('news.show', $news->id) }}"
                                class="h1 text-dark text-decoration-none hover-primary">{{ $news->title }}</a>
                        </div>
                        <div class="py-4">
                            <p class="text-secondary mb-0">
                                {!! Str::limit($news->content, 450, '...') !!}
                            </p>
                        </div>
                    @endforeach

                    <!-- Top Views Section -->
                    @foreach ($popularNews->take(1) as $news)
                        <div class="card border-0 bg-light rounded-4 shadow-sm">
                            <div class="card-body p-4">
                                <h3 class="mb-4">Top Views</h3>
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-6">
                                        <div class="rounded-4 overflow-hidden">
                                            <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                                class="img-fluid w-100" alt="" style="height: 250px; object-fit: cover;" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-3">
                                            <a href="{{ route('news.show', $news->id) }}" 
                                               class="text-dark text-decoration-none hover-primary">
                                                {{ $news->title }}
                                            </a>
                                        </h4>
                                        <div class="d-flex flex-column gap-2 text-secondary">
                                            <div><i class="bi bi-calendar3 me-2"></i>{{ $news->created_at->translatedFormat('d F Y H:i') }}</div>
                                            <div><i class="bi bi-eye me-2"></i>{{ number_format($news->views) }} Views</div>
                                            <div><i class="bi bi-heart me-2"></i>{{ number_format($news->likes->count()) }} Likes</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sidebar -->
                <div class="col-lg-5 col-xl-4">
                    <div class="card border-0 bg-light rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <div class="row g-4">
                                @foreach ($latestNews->skip(1)->take(1) as $news)
                                    <div class="col-12">
                                        <div class="rounded-4 overflow-hidden">
                                            <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                                class="img-fluid w-100" alt="" style="height: 250px; object-fit: cover;" />
                                        </div>
                                        <div class="mt-3">
                                            <h4 class="mb-3">
                                                <a href="{{ route('news.show', $news->id) }}"
                                                    class="text-dark text-decoration-none hover-primary">{{ $news->title }}</a>
                                            </h4>
                                            <div class="d-flex flex-column gap-2 text-secondary">
                                                <div><i class="bi bi-calendar3 me-2"></i>{{ $news->created_at->translatedFormat('d F Y H:i') }}</div>
                                                <div><i class="bi bi-eye me-2"></i>{{ number_format($news->views) }}</div>
                                                <div><i class="bi bi-heart me-2"></i>{{ number_format($news->likes->count()) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12">
                                    <hr class="my-2">
                                </div>

                                <!-- Recent Posts -->
                                @foreach ($latestNews->skip(2)->take(5) as $news)
                                    <div class="col-12">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-5">
                                                <div class="rounded-3 overflow-hidden">
                                                    <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                                        class="img-fluid w-100" alt="" style="height: 80px; object-fit: cover;" />
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <h6 class="mb-2">
                                                    <a href="{{ route('news.show', $news->id) }}"
                                                        class="text-dark text-decoration-none hover-primary">{{ $news->title }}</a>
                                                </h6>
                                                <div class="d-flex flex-column gap-1">
                                                    <small class="text-secondary">
                                                        <i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('d F Y H:i') }}
                                                    </small>
                                                    <small class="text-secondary">
                                                        <i class="bi bi-eye me-1"></i>{{ number_format($news->views) }}
                                                    </small>
                                                    <small class="text-secondary">
                                                        <i class="bi bi-heart me-1"></i>{{ number_format($news->likes->count()) }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        @if (!$loop->last)
                                            <hr class="my-3">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest News Carousel -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0">Latest News</h2>
                <div class="carousel-controls">
                    <button class="btn btn-primary btn-sm rounded-circle me-2" id="prevBtn">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-primary btn-sm rounded-circle" id="nextBtn">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            
            <div class="latest-news-carousel owl-carousel">
                @foreach ($latestNews as $news)
                    <div class="card border-0 rounded-4 shadow-sm mx-2">
                        <div class="rounded-top-4 overflow-hidden">
                            <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                class="card-img-top" alt="" style="height: 200px; object-fit: cover;" />
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">
                                <a href="{{ route('news.show', $news->id) }}" 
                                   class="text-dark text-decoration-none hover-primary">
                                    {{ Str::limit($news->title, 35, '...') }}
                                </a>
                            </h5>
                            <div class="d-flex justify-content-between text-secondary">
                                <small>{{ 'by ' . $news->author->name }}</small>
                                <small><i class="bi bi-calendar3 me-1"></i>{{ $news->created_at->translatedFormat('j F Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Trending Categories -->
    <div class="container-fluid py-5">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-lg-8 col-xl-9">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center border-bottom mb-4">
                        <h2 class="mb-3 mb-md-0">Trending Categories</h2>
                        <div class="nav nav-pills">
                            <button class="nav-link rounded-pill px-4 active">
                                {{ $categories->name }}
                            </button>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="row g-4">
                                @foreach ($categories->news()->where('status', 'Accept')->withCount('likes')->orderBy('likes_count', 'desc')->take(1)->get() as $news)
                                    <div class="col-lg-8">
                                        <div class="card border-0 rounded-4 shadow-sm">
                                            <div class="position-relative">
                                                <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                                    class="card-img-top rounded-top-4" alt="" style="height: 400px; object-fit: cover;" />
                                                <span class="position-absolute top-0 end-0 m-3 badge bg-primary px-3 py-2 rounded-pill">
                                                    {{ $categories->name }}
                                                </span>
                                            </div>
                                            <div class="card-body p-4">
                                                <h4 class="card-title mb-3">
                                                    <a href="{{ route('news.show', $news->id) }}" 
                                                       class="text-dark text-decoration-none hover-primary">
                                                        {{ $news->title }}
                                                    </a>
                                                </h4>
                                                <div class="d-flex gap-3 text-secondary mb-3">
                                                    <span><i class="bi bi-calendar3 me-2"></i>{{ $news->created_at->translatedFormat('d F Y') }}</span>
                                                    <span><i class="bi bi-eye me-2"></i>{{ number_format($news->views) }}</span>
                                                    <span><i class="bi bi-heart me-2"></i>{{ number_format($news->likes->count()) }}</span>
                                                </div>
                                                <p class="card-text text-secondary">
                                                    {!! Str::limit($news->content, 450, '...') !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card border-0 rounded-4 shadow-sm">
                                            <div class="card-body p-4">
                                                @foreach ($categories->news()->where('status', 'Accept')->withCount('likes')->orderBy('likes_count', 'desc')->skip(1)->take(5)->get() as $news)
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-4">
                                                            <div class="rounded-3 overflow-hidden">
                                                                <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                                                    class="img-fluid w-100" alt="" style="height: 70px; object-fit: cover;" />
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="badge bg-primary mb-2">{{ $categories->name }}</span>
                                                            <h6 class="mb-2">
                                                                <a href="{{ route('news.show', $news->id) }}" 
                                                                   class="text-dark text-decoration-none hover-primary">
                                                                    {{ Str::limit($news->title, 40) }}
                                                                </a>
                                                            </h6>
                                                            <div class="d-flex gap-2 text-secondary small">
                                                                <span><i class="bi bi-eye me-1"></i>{{ number_format($news->views) }}</span>
                                                                <span><i class="bi bi-heart me-1"></i>{{ number_format($news->likes->count()) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (!$loop->last)
                                                        <hr class="my-3">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-xl-3">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            @component('components.col-2')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
/* Gradient Overlays */
.bg-gradient {
    background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
}

/* Card Styles */
.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

/* Image Hover Effects */
.img-fluid {
    transition: transform 0.3s ease;
}

.overflow-hidden:hover .img-fluid {
    transform: scale(1.05);
}

/* Text Hover Effects */
.hover-primary {
    transition: color 0.3s ease;
}

.hover-primary:hover {
    color: var(--bs-primary) !important;
}

/* Navigation Pills */
.nav-pills .nav-link {
    color: var(--bs-dark);
    transition: all 0.3s ease;
}

.nav-pills .nav-link:hover {
    background-color: rgba(var(--bs-primary-rgb), 0.1);
}

.nav-pills .nav-link.active {
    background-color: var(--bs-primary);
    color: white;
}

/* Carousel Styling */
.latest-news-carousel {
    margin: 0 -0.5rem;
}

.latest-news-carousel .owl-stage {
    padding: 1rem 0;
}

.carousel-controls button {
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Responsive Adjustments */
@media (max-width: 767.98px) {
    .h1 {
        font-size: 1.75rem;
    }
    
    .h2 {
        font-size: 1.5rem;
    }
    
    .card-body {
        padding: 1rem;
    }
}
</style>

@endsection