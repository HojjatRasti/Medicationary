<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('articleMetaTags&schema')
    @yield('schema')
    @yield('askPageMetaTags')
    @yield('title')
    <!-- fav icon  -->
    <link rel="icon" type="image/x-icon" href="/images/medLogo.webp">
    <!-- import style.css file -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- initiate Bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- initiate QuillJS text editor -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <!-- innitiate Iconify -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <!-- initiate jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- import javascript files -->
    <script type="module" src="../js/podcast.js"></script>
    <script type="module" src="../js/ask.js"></script>
    <!-- initiate finger print -->
    <script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>
    <!-- Enter schema codes -->
    {{-- <script>@yield('schema')</script> --}}
    {{-- // @turnstileScripts() --}}
</head>
<body class="d-flex flex-column min-vh-100">
  <!-- nav bar -->
  <nav class="navbar sticky-top navbar-expand-md" id="nav-bar">
    <div class="container">

        <!-- nav logo -->
      <div class="col-2">
        <a class="navbar-brand" href="{{route('home.landscape')}}">
            <img src="/images/medLogo.webp" alt="Logo" width="50" height="50">
        </a>
      </div>

      <!-- nav button when it collapse to smal size -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="nav-icon">
            <iconify-icon icon="fluent:navigation-24-filled" style="color: white;" width="28" height="24"></iconify-icon>
        </span>
      </button>

      <!-- the elemts of navbar -->
      <div class="collapse navbar-collapse " id="mynavbar">
        <ul class="navbar-nav text-center col-12 ">
          <li class="nav-item">
            <a class="nav-link " href="{{route('home.blog')}}">Blog 📃</a>
          </li>
          {{-- webinar nav item --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.webinarsList')}}" rel="nofallow">Webinar 🎬</a>
          </li>
          {{-- answer nav item
          <li class="nav-item">
            <a class="nav-link" href="{{route('home.responses')}}">Answers</a>
          </li> --}}
          {{-- podcast nav item --}}
          <li class="nav-item ">
            <a class="nav-link" href="{{route('home.podcast')}}" rel="nofallow">Podcast 🎙️</a>
          </li>

        </ul>

      </div>

    </div>
  </nav>


