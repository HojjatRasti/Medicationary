@extends('layouts.frontend.master')

@section('MainPageMetaTags&schema')
<meta name="mainPageMetaTitle" content="Medicationary - مرجع تخصصی اطلاعات دارویی ، پزشکی 💊">
<meta name="mainPageMetaDescription" content="در Medicationary، اطلاعات جامع و معتبر درباره داروها، بیماری‌ها، و درمان‌ها را بیابید. مرجع تخصصی برای داروسازی، پزشکی، و سلامت.">
{{-- schema --}}
<script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "Medicationary",
          "url": "https://medicationary.ir/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "{search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
</script>
@endsection

@section('content')


  <!-- header -->
  <header id="header">

    <div id="header-img" class="text-center">
      <img src="/images/header.webp" alt="headImg" class="img-fluid">
    </div>

  </header>

  <!-- ask a pharmacis -->
  <section class=" ask-phar" >


        <a href="{{route('home.ask')}}" class="h2 col-xl-8 d-flex justify-content-center ">
            از یک داروساز بپرس
          </a>


    <div class="container d-flex justify-content-center justify-content-xl-between ">

      <div class="discription d-xl-inline-block">
        <p class="fs-5 " style="text-align: justify;">
            آیا سوالی در مورد داروها، عوارض جانبی، تداخلات دارویی یا نحوه مصرف داروها دارید؟ با کلیک روی عنوان یا تصویر روبه‌رو وارد بخش پرسش و پاسخ شوید و سوالات خود را از متخصصان داروسازی بپرسید. ما آماده‌ایم تا به شما کمک کنیم تا با اطمینان بیشتر از داروهای خود استفاده کنید.
        </p>
      </div>

      <div class="d-flex justify-content-center">
        <a href="{{route('home.ask')}}" >
        <img src="/images/ask_a_pharmacist.webp" alt="pharmacistIcon" >
        </a>
      </div>

    </div>
  </section>
  {{-- <!-- podcast -->
  <section class="podcast" >
    <div class="container ">
      <div style="padding: 25px 0 15px 0;">

        <a href="{{route('home.podcast')}}" id="podcasts-title" class="col-xl-8 d-flex justify-content-center" title="برای مشاهده پادکست های بیشتر کلیک کنید">
        <p class="h2">پادکست</p>
        </a>

      </div>
      <!-- suggested podcasts -->
      <div class="d-flex justify-content-center align-items-center justify-content-xl-between pb-5">
        <p class="text-light col-8 d-none d-md-block">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
        </p>

        <div class="headphone-img col-xl-3 d-flex justify-content-center col-12 col-md-4">
            <a href="{{route('home.podcast')}}" title="برای مشاهده پادکست های بیشتر کلیک کنید" >
            <img src="/images/headphone.png" alt="pharmacistIcon" class="img-fluid ">
            </a>
        </div>

      </div>
    </div>
  </section> --}}
  <!-- blog -->
  <section id="blog" class=" podcast p-3">

    <div id="b-title" class="d-block">
      <p class="h2 text-light">
        جدید ترین مقالات منتشرشده
      </p>
    </div>

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


@endsection
