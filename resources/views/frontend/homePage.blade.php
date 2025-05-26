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
              <img src="/images/headphone.png" alt="pharmacistIcon" class="img-fluid ">
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
