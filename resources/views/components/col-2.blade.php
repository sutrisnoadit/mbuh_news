<h4 class="my-4">Recommendation News</h4>
<div class="row g-4 mb-4">
    @foreach (\App\Models\News::where('status', 'Accept')->inRandomOrder()->take(5)->get() as $news)
        <div class="col-12">
            <div class="row g-4 align-items-center features-item">
                <div class="col-4">
                    <div class="rounded-circle position-relative">
                        <div class="overflow-hidden rounded-circle">
                            <img src="{{ $news->image ? asset('storage/images/' . $news->image) : asset('img/noimg.jpg') }}"
                                class="img-zoomin img-fluid rounded-circle w-100" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="features-content d-flex flex-column">
                        <p class="text-uppercase mb-2">{{ $news->category->name }}</p>
                        <a href="{{ route('news.show', $news->id) }}" class="h6">
                            {{ $news->title }}
                        </a>
                        <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                            {{ $news->created_at->translatedFormat('d F Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


