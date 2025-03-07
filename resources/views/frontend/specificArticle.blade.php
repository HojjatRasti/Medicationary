@extends('layouts.frontend.master')

@section('description', $post->meta_description)
@section('keywords', $post->meta_title)
@section('schema', $post->schema)

@section('content')

  <!-- header -->
  <header id="header" class="position-relative">

    <div id="header-img" class="text-center">
      <img src="../images/blog-article-head.webp" alt="headImg" class="img-fluid">
    </div>

  </header>
  <!-- blog contents -->
  <div class="container">
    <div id="blog-article-title" class="text-center d-inline-block w-100 ">
        <h1 class="article-title fw-bold">{{$post->title}}</h1>
        <p>{{$post->author}}</p>
        <p>{{$post->created_at->jdate('j F Y')}}</p>
    </div>
    <div class="mt-5 pe-5 ps-5 pt-3 pb-3 container-fluid ql-editor" dir="ltr">

            {!!$post->body!!}

            <div dir="rtl" class="d-flex justify-content-center">
                <span class="fs-6 text-center d-flex align-items-center justify-content-center ">
                    آیا مطلب ارائه شده مفید و مرتبط بود؟

                    <div class="d-flex align-items-center">
                        @if(in_array(Cookie::get('user_id'), $users_id_array))
                            <button class="btn border-0 likeBtn" id="like-button">
                                <svg class="n-like d-none" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="#2f88ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.54 10.105h5.533c2.546 0-.764 10.895-2.588 10.895H4.964A.956.956 0 0 1 4 20.053v-9.385c0-.347.193-.666.502-.832C6.564 8.73 8.983 7.824 10.18 5.707l1.28-2.266A.87.87 0 0 1 12.222 3c3.18 0 2.237 4.63 1.805 6.47a.52.52 0 0 0 .513.635"/></svg>
                                <svg class="y-like" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#2f88ff" d="M4.148 9.175c-.55.294-.898.865-.898 1.493v9.385c0 .95.78 1.697 1.714 1.697h12.521c.579 0 1.024-.404 1.304-.725c.317-.362.618-.847.894-1.383c.557-1.08 1.08-2.494 1.459-3.893c.376-1.392.628-2.832.607-3.956c-.01-.552-.087-1.11-.312-1.556c-.247-.493-.703-.882-1.364-.882h-5.25c.216-.96.51-2.497.404-3.868c-.059-.758-.246-1.561-.723-2.189c-.509-.668-1.277-1.048-2.282-1.048c-.582 0-1.126.31-1.415.822m0 0l-1.28 2.266c-.512.906-1.3 1.58-2.258 2.176c-.638.397-1.294.727-1.973 1.07a50 50 0 0 0-1.148.591" stroke-width="0.5" stroke="#2f88ff"/></svg>
                            </button>
                            <p class="fs-6 mt-3" id="likesNumber">{{$post->likes}}</p>
                        @else
                            <button class="btn border-0 likeBtn" id="like-button">
                                <svg class="n-like" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="#2f88ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.54 10.105h5.533c2.546 0-.764 10.895-2.588 10.895H4.964A.956.956 0 0 1 4 20.053v-9.385c0-.347.193-.666.502-.832C6.564 8.73 8.983 7.824 10.18 5.707l1.28-2.266A.87.87 0 0 1 12.222 3c3.18 0 2.237 4.63 1.805 6.47a.52.52 0 0 0 .513.635"/></svg>
                                <svg class="y-like d-none" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#2f88ff" d="M4.148 9.175c-.55.294-.898.865-.898 1.493v9.385c0 .95.78 1.697 1.714 1.697h12.521c.579 0 1.024-.404 1.304-.725c.317-.362.618-.847.894-1.383c.557-1.08 1.08-2.494 1.459-3.893c.376-1.392.628-2.832.607-3.956c-.01-.552-.087-1.11-.312-1.556c-.247-.493-.703-.882-1.364-.882h-5.25c.216-.96.51-2.497.404-3.868c-.059-.758-.246-1.561-.723-2.189c-.509-.668-1.277-1.048-2.282-1.048c-.582 0-1.126.31-1.415.822m0 0l-1.28 2.266c-.512.906-1.3 1.58-2.258 2.176c-.638.397-1.294.727-1.973 1.07a50 50 0 0 0-1.148.591" stroke-width="0.5" stroke="#2f88ff"/></svg>
                            </button>
                            <p class="fs-6 mt-4" id="likesNumber">{{$post->likes}}</p>
                        @endif
                    </div>
                </span>


            </div>

    </div>
  </div>
  <script>

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

    let likeOff = document.querySelector('.n-like');
    let likeON = document.querySelector('.y-like');

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
                data: {likeStatus:status},
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
</script>



  @endsection
