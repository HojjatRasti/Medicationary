@extends('layouts.frontend.master')

@section('articleMetaTags&schema')
    <meta name="description" content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_title}}">
    <script type="application/ld+json">{!! $post->schema !!}</script>
    <style>
        p img{
            max-width: 100%;
        }
    </style>
@endsection

@section('title')
    <title>{{$post->meta_title}}</title>
@endsection

@section('content')

  <!-- header -->
  <header id="header" class="position-relative">

    <div id="header-img" class="text-center">
      <img src="../images/blog-article-head.png" alt="headImg" class="img-fluid">
    </div>

  </header>
  <!-- blog contents -->
  <div class="container">
    <div id="blog-article-title" class="text-center d-inline-block w-100 mt-2 ">
        <h1 class="article-title fw-bold mb-4">{{$post->title}}</h1>
        <p>{{$post->author}}</p>
        <p>{{$post->created_at->jdate('j F Y')}}</p>
    </div>
    <div class=" pe-5 ps-5 pb-0 pt-0 container-fluid ql-editor " dir="ltr" style="line-height: 2rem">

            {!!$post->body!!}



    </div>
    <div class="d-flex align-items-center justify-content-center pb-3">
        <span class="fs-6 mt-1 text-center">
            Was the provided content useful and relevant?
        </span>
        <div class="d-flex align-items-center">
                <button class="btn border-0 likeBtn d-flex" id="like-button">
                    
                    <svg class="n-like" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><path fill="none" stroke="#2f88ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326C31 40 44 30 44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.99 10.99 0 0 0 15 8"/></svg>

                    <svg class="y-like d-none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><path fill="#2f88ff" stroke="#2f88ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326C31 40 44 30 44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.99 10.99 0 0 0 15 8"/></svg>
                </button>
                   <span class="fs-6 mt-2" id="likesNumber">{{$post->likes}}</span>
        </div>



    </div>
  </div>
  <script>

    // button_section_via_ajax
    let likeOff = document.querySelector('.n-like');
    let likeON = document.querySelector('.y-like');
    let fingerprint
    let usersIdentifier = @json($users_id_array);

    let imgflex = document.querySelectorAll('.ql-editor p');


    for(let i = 0; i < imgflex.length; i++){
        if(imgflex[i].innerHTML == 'IMG'){
            imgflex[i].classList.add('d-flex');
        }
    };


    document.addEventListener("DOMContentLoaded", async function(){
        const fp = await FingerprintJS.load();
        const result = await fp.get();
        fingerprint = result.visitorId; // Unique fingerprint ID

        if (usersIdentifier.includes(fingerprint)){
            likeON.classList.remove('d-none');
            likeOff.classList.add('d-none');
        }
    })

        $('#like-button').on('click', function() {
            const input = $(this);
            let status
            {{--let likeNumber = {{$post->likes}};--}}
            let likesNumber = document.getElementById('likesNumber').innerHTML;

            if(likeON.classList.contains('d-none')){
                status = 1;
            } else{
                status = 0;
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('home.blog.like', $post->id)}}',
                method: 'POST',
                data: {likeStatus: status,
                    fingerprint: fingerprint},
                success: function(response) {
                    if(response == 0){
                        likeON.classList.add('d-none');
                        likeOff.classList.remove('d-none');
                        $('#likesNumber').html(Number(likesNumber) - 1);
                    } else if(response == 1){
                        likeON.classList.remove('d-none');
                        likeOff.classList.add('d-none');
                        $('#likesNumber').html(Number(likesNumber) + 1);
                    }
                    },
            });
        });

    // });

    {{--    const likeButton = document.getElementById('like-button'); // Your like button--}}

    {{--    likeButton.addEventListener('click', () => {--}}
    {{--        const postId = likeButton.dataset.postId; // Get the post ID from the button--}}

    {{--        fetch(`{{route('home.blog.like', $post->id)}}`, {  // Your route--}}
    {{--            method: 'POST',--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Important for Laravel--}}
    {{--                'Content-Type': 'application/json'--}}
    {{--            },--}}
    {{--        })--}}
    {{--            .then(response => response.json())--}}
    {{--            .then(data => {--}}
    {{--                if (data.message === 'Like added') {--}}
    {{--                    likeButton.disabled = true; // Disable the button after a successful like--}}
    {{--                    // likeButton.textContent = "Liked!"; // Update the button text--}}
    {{--                } else if (data.message === 'You have already liked this post.') {--}}
    {{--                    alert("You've already liked this post."); // Or a nicer message--}}
    {{--                } else {--}}
    {{--                    console.error("Error:", data.message);--}}
    {{--                }--}}
    {{--            })--}}
    {{--            .catch(error => {--}}
    {{--                console.error('Error:', error);--}}
    {{--            });--}}
    {{--    });--}}

    // $(document).ready(function() {

    //     (async () => {
    //
    //
    //     // Send fingerprint to Laravel backend
    //     fetch('/save-fingerprint', {
    //     method: 'POST',
    //     headers: {
    //     'Content-Type': 'application/json',
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // },
    //     body: JSON.stringify({ fingerprint: fingerprint })
    // })
    //     .then(response => response.json())
    //     .then(data => console.log('Fingerprint saved:', data))
    //     .catch(error => console.error('Error:', error));
    // })();
</script>



  @endsection
