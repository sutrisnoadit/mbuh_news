@extends('layouts.app')

@section('content')
    <!-- Article Detail Section -->
    <div class="container-fluid py-5">
        <div class="container py-4">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}" class="text-decoration-none">
                            <i class="bi bi-house-door me-1"></i>Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ $news->title }}</li>
                </ol>
            </nav>

            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Article Header -->
                    <div class="mb-4">
                        <h1 class="display-5 fw-bold mb-0">{{ $news->title }}</h1>
                    </div>

                    <!-- Featured Image -->
                    <div class="position-relative rounded-4 overflow-hidden mb-4 shadow-sm">
                        <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                             class="img-fluid w-100" 
                             alt=""
                             style="max-height: 500px; object-fit: cover;">
                        <span class="position-absolute top-0 end-0 m-3 badge bg-primary px-3 py-2 rounded-pill">
                            {{ $news->category->name }}
                        </span>
                    </div>

                    <!-- Article Content -->
                    <div class="content mb-5">
                        <div class="text-secondary">
                            {!! $news->content !!}
                        </div>
                    </div>

                    <!-- Tags & Likes -->
                    <div class="card border-0 bg-light rounded-4 shadow-sm mb-5">
                        <div class="card-body p-4">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2">
                                    <h5 class="mb-0">Tags:</h5>
                                    <span class="badge bg-primary rounded-pill px-3 py-2">
                                        {{ $news->category->name }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('news.like', $news->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light rounded-circle shadow-sm me-2" style="width: 40px; height: 40px;">
                                            @if ($news->likes->where('device_id', session('device_id'))->count())
                                                <i class="bi bi-heart-fill text-primary"></i>
                                            @else
                                                <i class="bi bi-heart text-primary"></i>
                                            @endif
                                        </button>
                                    </form>
                                    <span class="fw-medium">{{ number_format($news->likes->count()) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Author Bio -->
                    <div class="card border-0 rounded-4 shadow-sm mb-5">
                        <div class="card-body p-4">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm-3">
                                    <img src="{{ $news->author->image ? asset('storage/images/' . $news->author->image) : asset('img/default.jpeg') }}"
                                         class="img-fluid rounded-circle" 
                                         alt="">
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="mb-3">{{ $news->author->name }}</h4>
                                    <p class="text-secondary mb-0">{{ $news->author->bio }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Articles -->
                    <div class="card border-0 rounded-4 shadow-sm mb-5">
                        <div class="card-body p-4">
                            <h4 class="mb-4">You Might Also Like</h4>
                            <div class="row g-4">
                                @foreach ($randomNews as $news)
                                    <div class="col-md-6">
                                        <div class="card border-0 rounded-4 bg-light h-100">
                                            <div class="row g-0 h-100">
                                                <div class="col-4">
                                                    <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                                         class="img-fluid rounded-start-4 h-100" 
                                                         alt=""
                                                         style="object-fit: cover;">
                                                </div>
                                                <div class="col-8">
                                                    <div class="card-body">
                                                        <h6 class="card-title mb-2">
                                                            <a href="{{ route('news.show', $news->id) }}" 
                                                               class="text-dark text-decoration-none hover-primary">
                                                                {{ $news->title }}
                                                            </a>
                                                        </h6>
                                                        <small class="text-secondary">
                                                            <i class="bi bi-calendar3 me-2"></i>
                                                            {{ $news->created_at->translatedFormat('d F Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <div id="disqus_thread"></div>
                            <script>
                                (function() {
                                    var d = document,
                                        s = d.createElement('script');
                                    s.src = 'https://news-center-1.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>
                                Please enable JavaScript to view the 
                                <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                            </noscript>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <!-- Search Bar -->
                            <div class="mb-4">
                                <div class="input-group">
                                    <input type="search" 
                                           class="form-control" 
                                           placeholder="Search articles..."
                                           aria-label="Search">
                                    <button class="btn btn-primary px-4" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Sidebar Components -->
                            @component('components.col-2')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
/* Content Styling */
.content {
    font-size: 1.1rem;
    line-height: 1.8;
}

/* Card Hover Effects */
.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

/* Link Hover Effects */
.hover-primary {
    transition: color 0.3s ease;
}

.hover-primary:hover {
    color: var(--bs-primary) !important;
}

/* Badge Styling */
.badge {
    font-weight: 500;
    letter-spacing: 0.5px;
}

/* Breadcrumb Styling */
.breadcrumb {
    font-size: 0.95rem;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    font-size: 1.2rem;
    line-height: 1;
}

/* Like Button Animation */
.btn-light {
    transition: all 0.3s ease;
}

.btn-light:hover {
    background-color: var(--bs-primary);
    color: white;
}

.btn-light:hover i {
    color: white !important;
}

/* Responsive Adjustments */
@media (max-width: 767.98px) {
    .display-5 {
        font-size: 2rem;
    }
    
    .content {
        font-size: 1rem;
    }
}
</style>

<script id="dsq-count-scr" src="//news-center-1.disqus.com/count.js" async></script>
@endsection