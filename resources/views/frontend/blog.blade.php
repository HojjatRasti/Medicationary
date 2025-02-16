@extends('layouts.frontend.master')

@section('content')
    <!-- header -->
    <header id="header" class="z-3 text-center d-flex flex-wrap justify-content-center mb-3 ">

        <div id="header-img" class="text-center col-12">
            <img src="../images/blog-head.jpg" alt="headImg" class="img-fluid">
        </div>

        {{-- search box --}}
        <div  class="z-3 search-box col-10 col-md-5 d-flex flex-wrap justify-content-center ">

            <div>
                {{-- search button --}}
                <button class="search-btn btn col-12 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <svg style="rotate: 275deg;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 48 48"><defs><mask id="ipTSearch0"><g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4.4"><path fill="#333333" d="M21 38c9.389 0 17-7.611 17-17S30.389 4 21 4S4 11.611 4 21s7.611 17 17 17Z"/><path stroke-linecap="round" d="M26.657 14.343A7.98 7.98 0 0 0 21 12a7.98 7.98 0 0 0-5.657 2.343m17.879 18.879l8.485 8.485"/></g></mask></defs><path fill="#8ad9e6" d="M0 0h48v48H0z" mask="url(#ipTSearch0)"/></svg>
                </button>
                {{-- close search button --}}
                <button class="search-close btn col-12 d-none " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><path fill="none" stroke="#f17979" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L17.94 6M18 18L6.06 6"/></svg>
                </button>
            </div>
            {{-- search box --}}
            <div class="collapse col-12" id="collapseExample">
                <div class="input-group flex-nowrap " dir="ltr">
                    {{-- search btn --}}
                    {{-- <span class="btn input-group-text rounded-bottom-0" id="addon-wrapping" style="background-color: #f8f9fa; border:1px solid #dee2e6;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#8ad9e6" d="M10 18a7.95 7.95 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.95 7.95 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" stroke-width="0.5" stroke="#8ad9e6"/></svg>
                    </span> --}}
                    {{-- search input --}}
                    <input dir="rtl" type="text" class="border-primary-subtle border-4 rounded-2 searchInput form-control text-center" placeholder="جستجو..."  aria-describedby="addon-wrapping">

                </div>
                {{-- search result --}}
                {{-- <div class="searchResultList text-center d-none">
                    <ul class="list-group p-0 rounded-top-0">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-around mt-2">
                                <p>تایتل مقاله</p>
                                <p>نویسند</p>
                            </div>
                        </li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div> --}}

            </div>
        </div>

    </header>


    <!-- blog contents -->
    @include('errors.message')
    @foreach($posts as $post)
        <div class="article container text-center d-md-flex justify-content-end">


            <img class="col-md-4 ms-3 img-thumbnail rounded object-fit-fill " src="/{{$post->thumbnail_url}}" alt=""
                 style="max-height: 245px;">


            <div class="article-data col-md-8 text-md-end">
                <p class="article-cat h3">{{$post->category}}</p>

                <p class="article-title h2">{{$post->title}}</p>

                <p class="article-cat h3">نام نویسنده: {{$post->author}}</p>

                <p class="article-date">{{$post->created_at->jdate('j F Y')}}</p>

                <p class="article-discription">{{$post->abstract}}</p>
                {{--          route('home.post', $post->id)--}}
                <a href="{{route('home.post', $post->id)}}">
                    <button class="article-btn btn">مطالعه بیشتر</button>
                </a>
            </div>

        </div>

    @endforeach
    {{-- pagination --}}
    {{$posts->links()}}

    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                const input = $(this);
                const searchResult = $('.search-results');
                searchResult.html('در حال جستجو ...');
                $.ajax({
                    url: '<?= base_path() . 'Http/Utilities/BlogSearch.php' ?>',
                    method: 'POST',
                    data: {keyword:input.val()},
                    success: function(response) {
                        searchResult.slideDown().html(response);
                    }
                });
            });
        });
    </script>
@endsection
