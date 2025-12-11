<x-layout title="{{ $blog->title }}" meta_description="{{ $blog->description }}" meta_keywords="{{ $blog->keywords }}">

    <main class="blog-detail-page py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article class="blog-post bg-white shadow-sm rounded overflow-hidden">
                        <header class="post-header p-4 p-md-5 border-bottom">
                            <h1 class="post-title display-5 fw-bold text-dark mb-4">
                                {{ $blog->title }}
                            </h1>
                            <div class="post-meta text-muted small d-flex align-items-center flex-wrap">
                                <span class="me-3">By <span
                                        class="fw-semibold text-dark">{{ $blog->author ?? 'Admin' }}</span></span>
                                <span class="me-3">&bull;</span>
                                <time datetime="{{ $blog->created_at->toIso8601String() }}" class="me-3">
                                    {{ $blog->created_at->format('F d, Y') }}
                                </time>
                                @if($blog->category)
                                    <span class="me-3">&bull;</span>
                                    <a href="{{ route('blog.category', $blog->category) }}"
                                        class="text-decoration-none text-primary fw-bold">
                                        {{ $blog->category->name }}
                                    </a>
                                @endif
                            </div>
                        </header>

                        @if($blog->image)
                            <figure class="post-image mb-0">
                                <img src="{{ asset('uploads/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    class="w-100 object-fit-cover" style="height: 400px;">
                            </figure>
                        @endif

                        <div class="post-content p-4 p-md-5 text-dark lh-lg">
                            {!! $blog->description !!}
                        </div>

                        <!-- 
                        @if($blog->tags->count())
                        <footer class="post-footer p-4 p-md-5 border-top d-flex flex-wrap gap-2">
                            @foreach($blog->tags as $tag)
                                <a href="{{ route('blog.tag', $tag->slug) }}" class="badge bg-light text-dark text-decoration-none border px-3 py-2 rounded-pill">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </footer>
                        @endif 
                        -->
                    </article>
                </div>
            </div>
        </div>
    </main>

</x-layout>