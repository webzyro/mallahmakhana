<x-layout title="Blog Page"
    meta_description="Discover healthy recipes, nutritional facts about Fox Nuts, and insights into our premium makhana processing."
    meta_keywords="Fox Nuts, Makhana, Healthy Recipes, Nutritional Facts, Premium Makhana Processing">
    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="container-fs">
            <h1 class="blog-hero-title">Our Latest Stories</h1>
            <p class="blog-hero-subtitle">Discover healthy recipes, nutritional facts about Fox Nuts, and insights into
                our premium makhana processing.</p>
        </div>
    </section>

    <!-- Blog Listing Section -->
    <section class="py-5 bg-white">
        <div class="container-fs px-4">
            <div class="row g-4">
                <!-- Blog Item 1 -->
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <article class="blog-card">
                            <div class="blog-img-wrapper">
                                <img src="{{ asset('uploads/' . $blog->image) }}" alt="{{$blog->title}}">
                                <span class="blog-date-badge">{{$blog->created_at->format('d M, Y')}}</span>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span><i class="fas fa-user-circle"></i> {{$blog->author}}</span>
                                    <span><i class="fas fa-folder"></i> {{$blog->category}}</span>
                                </div>
                                <h2 class="blog-title">{{$blog->title}}</h2>
                                <p class="blog-excerpt">
                                    {{ Str::limit(strip_tags($blog->description), 150) }}
                                </p>
                                <a href="{{ route('blog.show', $blog->slug) }}" class="read-more-btn text-decoration-none">
                                    Read Article <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Placeholder -->
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{-- Previous Button --}}
                            @if ($blogs->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $blogs->previousPageUrl() }}"
                                        style="color: var(--Primary);">
                                        Previous
                                    </a>
                                </li>
                            @endif


                            {{-- Page Numbers --}}
                            @foreach ($blogs->links()->elements[0] ?? [] as $page => $url)
                                @if ($page == $blogs->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link"
                                            style="background-color: var(--Primary); border-color: var(--Primary);">
                                            {{ $page }}
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}" style="color: var(--Primary);">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach


                            {{-- Next Button --}}
                            @if ($blogs->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $blogs->nextPageUrl() }}" style="color: var(--Primary);">
                                        Next
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </section>
</x-layout>