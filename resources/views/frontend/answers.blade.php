@extends('layouts.frontend.master')

@section('title')
    <title>پاسخ ها</title>
@endsection

@section('content')
  <!-- header -->
  <header id="header" class="text-center  d-flex flex-wrap justify-content-center mb-3">

    <div id="header-img" class="text-center">
      <img src="../images/answear.jpg" alt="headImg" class="img-fluid">
    </div>
    {{-- search box --}}
    <div  class="z-3 search-box col-10 col-md-5 d-flex flex-wrap justify-content-center ">

        <div>
            {{-- search button --}}
            <button class="search-btn btn col-12 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <svg style="rotate: 275deg;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><defs><mask id="ipTSearch0"><g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4.4"><path fill="#333333" d="M21 38c9.389 0 17-7.611 17-17S30.389 4 21 4S4 11.611 4 21s7.611 17 17 17Z"/><path stroke-linecap="round" d="M26.657 14.343A7.98 7.98 0 0 0 21 12a7.98 7.98 0 0 0-5.657 2.343m17.879 18.879l8.485 8.485"/></g></mask></defs><path fill="#8ad9e6" d="M0 0h48v48H0z" mask="url(#ipTSearch0)"/></svg>
            </button>
            {{-- close search button --}}
            <button class="search-close btn col-12 d-none " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="none" stroke="#f17979" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L17.94 6M18 18L6.06 6"/></svg>
            </button>
        </div>
        {{-- search box --}}
        <div class="collapse col-12" id="collapseExample">
            <div class="input-group flex-nowrap searchDiv  " dir="ltr">
                {{-- switch to category search --}}
                <button class="btn input-group-text categoryBtn " id="addon-wrapping" style="background-color: #f8f9fa; border:1px solid #dee2e6;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><path fill="#8ad9e6" d="M27 22.141V18a2 2 0 0 0-2-2h-8v-4h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4H7a2 2 0 0 0-2 2v4.142a4 4 0 1 0 2 0V18h8v4.142a4 4 0 1 0 2 0V18h8v4.141a4 4 0 1 0 2 0M13 4h6l.001 6H13ZM8 26a2 2 0 1 1-2-2a2 2 0 0 1 2 2m10 0a2 2 0 1 1-2-2a2.003 2.003 0 0 1 2 2m8 2a2 2 0 1 1 2-2a2 2 0 0 1-2 2" stroke-width="1" stroke="#8ad9e6"/></svg>
                </button>
                {{-- search input --}}
                <input dir="rtl" type="text" class=" searchInput form-control text-center" placeholder="جستجو..."  aria-describedby="addon-wrapping">

            </div>
            {{-- category search --}}
            <div class="categoryDiv input-group d-none  " dir="ltr">

                <button class="btn input-group-text searchBtn" id="addon-wrapping" style="background-color: #f8f9fa; border:1px solid #dee2e6;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#8ad9e6" d="M10 18a7.95 7.95 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.95 7.95 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8m0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6" stroke-width="0.5" stroke="#8ad9e6"/></svg>
                </button>
                <select class="form-select text-center fs-5  " id="inputGroupSelect03" aria-label="Example select with button addon" dir="rtl">
                  <option selected>Choose...</option>
                  <option value="1">
                    <span>تناسب اندام</span>
                    <span>(56)</span>
                  </option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
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
  <!-- answear list -->
  @foreach($responses as $response)
  <div class="container">
    <div class="ask text-center d-md-flex justify-content-between  m-3">

        <div id="answear-img" class="col-md-3 h-auto col-12 " >
          <img class="img-thumbnail mt-4" src="/{{$response->thumbnail_url}}" alt="">
        </div>

        <div class="ask-data col-md-9 text-md-end h-auto p-4">
            <p class="ask-title h2 text-center">{{$response->title}}</p>
          <div class="d-flex justify-content-end m-2">
            <p class="ask-cat h4 d-inline">{{$response->category}}</p>
          </div>
          <p class="ask-discription overflow-scroll" style="height: 140px;">
              {{$response->description}}
          </p>
          <a href="{{route('home.post', $response->id)}}"><button class="article-btn btn">مطالعه بیشتر</button></a>
        </div>
      </div>

  @endforeach
  {{-- pagination --}}
  {{$responses->links()}}
@endsection
