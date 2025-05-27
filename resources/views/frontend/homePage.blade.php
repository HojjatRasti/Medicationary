@extends('layouts.frontend.master')

@section('schema')
<!-- schema  -->
<script type="application/ld+json">
        
</script>
@endsection

@section('title')
<!-- Meta Tile & Meta Description -->
    <title>Medicationary💊</title>
    <meta name="description" content="At Medicationary, discover reliable and comprehensive information about medications, diseases, and treatments — your trusted reference for pharmacy, medicine, and health.">
@endsection

@section('content')


  <!-- header -->
  <header id="header">

    <div id="header-img" class="text-center">
      <img src="/images/header.webp" alt="headImg" class="img-fluid">
    </div>

  </header>

  <main class="flex-grow-1">
    <!-- ask a pharmacis -->
    <section class=" ask-phar" >
      {{-- ask a pharmacis Title --}}
      <a href="{{route('home.ask')}}" class="h2 col-xl-8 d-flex justify-content-center ">
          Ask a pharmacist
      </a>
      {{-- ask a pharmecist main part --}}
      <div class="container d-flex justify-content-center justify-content-xl-between ">
        {{-- ask a pharmecist text --}}
        <div class="discription d-xl-inline-block">
          <p class="fs-5 " style="text-align: justify;">
            Have questions about your medications, side effects, or drug interactions? Tap on the title or image to enter our Q&A section and get expert advice from professional pharmacists. We're here to empower you to take your medicines safely and confidently.
          </p>
        </div>
        {{-- ask a pharmecist pic --}}
        <div class="d-flex justify-content-center">
          <a href="{{route('home.ask')}}" >
            <img src="/images/ask_a_pharmacist.webp" alt="pharmacistIcon" >
          </a>
        </div>
      </div>
    </section>
    <!-- podcast -->
    <section class="podcast" >
      <div class="container ">
        {{-- podcast title --}}
        <div style="padding: 25px 0 15px 0;">
          <a href="{{route('home.podcast')}}" id="podcasts-title" class="col-xl-8 d-flex justify-content-center" title="Click here to explore more podcasts">
            <p class="h2">Podcast</p>
          </a>
        </div>
        <!--podcasts main -->
        <div class="d-flex justify-content-center align-items-center justify-content-xl-between pb-5">
          {{-- podcast text --}}
          <p class="text-light col-8 d-none d-md-block">
            Dive into the world of health and medicine with our podcast! Tune in to expert discussions, latest updates, and practical tips from pharmacists and healthcare professionals. Subscribe now and empower your wellness journey with trusted knowledge—anytime, anywhere.
          </p>
          {{-- podcast pic --}}
          <div class="headphone-img col-xl-3 d-flex justify-content-center col-12 col-md-4">
              <a href="{{route('home.podcast')}}" title="Click here to explore more podcasts" >
                <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 512 512"><path fill="#fff" d="M256 27.998c-33.784 0-67.564 12.67-80.97 38.004H240v17.996h-70.574c-.563 4.866-.428 8.98-.428 14.004H240v17.996h-71.002v14.004H240v17.996h-71.002v14.004h174.004v-14.004H272v-17.996h71.002v-14.004H272V98.002h71.002c.022-4.63.077-9.796-.428-14.004H272V66.002h64.97C323.565 40.668 289.785 27.998 256 27.998M80 162.002v17.996h22.678c-.148 4.753-.266 9.44-.326 14.004h18.002c.06-4.551.18-9.241.332-14.004h30.316v-17.996zm280.998 0v17.996h29.94a861 861 0 0 1-.254 14.004h18.013c.12-4.563.192-9.25.24-14.004H432v-17.996zm-192 17.996v18.004h174.004v-18.004zm-66.654 32c1.175 86.626 19.908 134.76 47.8 161.498c24.806 23.779 55.434 29.003 82.854 30.158v46.348h46.004v-46.377c26.698-1.218 55.672-6.572 79.361-30.262c26.772-26.771 45.324-74.691 49.658-161.365h-18.046c-4.382 83.532-22.405 126.705-44.338 148.639C320.364 385.91 288 386.002 256 386.002s-67.037-.226-93.4-25.498c-22.91-21.962-41.029-64.919-42.245-148.506zm66.654 4V283c0 39.1 37.7 59.99 78.004 62.691V215.998zm96 0v129.693c40.303-2.7 78.004-23.591 78.004-62.691v-67.002zm-144 252v16.004h270.004v-16.004z"/></svg>
              </a>
          </div>
        </div>
      </div>
    </section>
    <!-- blog -->
    <section id="blog" class=" podcast p-3">
      {{-- blog Title --}}
      <div id="b-title" class="d-block">
        <p class="h2 text-light">
          Latest Published Articles
        </p>
      </div>
      {{-- blog latests posts --}}
      <div id="blog-items" class="d-xl-flex justify-content-between container text-light " >
          @if(count($posts) > 0)
        <div id="blog-imp-article" class="col-xl-7 mb-3 p-0  float-xl-end " >
          <a href="{{route('home.post',$posts[0]->id)}}">
            <img src="/{{$posts[0]->thumbnail_url}}" alt="" id="imp-article-img" class="img-fluid img-thumbnail object-fit-fill border rounded ">
          </a>

          <a href="{{route('home.post',$posts[0]->id)}}" >
            <div id="blog-imp-title-article">
              <p class="h3 link-light">{{$posts[0]->title}}</p>
            </div>
          </a>

          <div id="blog-imp-discription-article" class="text-center">
            <p class="overflow-auto w-75 d-inline-block text-light-emphasis" style="text-align: justify;">{{$posts[0]->abstract}}</p>
          </div>
        </div>
          @endif
        <div class="flex-column col-xl-4">
            @foreach($posts as $post)
                @if($loop->first) @continue @endif
          <div id="blog-article" class="float-start d-xl-inline-block border-bottom border-secondary border-3" >

              <a href="{{route('home.post',$post->id)}}">
                <img src="/{{$post->thumbnail_url}}" alt="" id="article-img" class="col-4 float-end">
              </a>
              <div class="col-8 float-start" id="blog-article-discription" >
                <a href="{{route('home.post',$post->id)}}"><p class="h5 link-light" >{{$post->title}}</p></a>

                <p class="text-light-emphasis" style="width: 280px; height: 125px; overflow: hidden; margin-right: 35px; text-align: justify">{{$post->abstract}}</p>
              </div>
          </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
