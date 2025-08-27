@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid position-relative">

        <!-- category form -->
        <div class="col-12 col-lg-9 float-end pe-5 ps-5 ">
            {{--page title --}}
            <nav aria-label="breadcrumb" class="d-flex mt-3 fs-3 fw-bold">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">Edit Podcast Category</li>
                </ol>
            </nav>
            @include('errors.message')
                {{-- add category --}}
            <form action="{{ route('admin.podcast.categories.update', $category->id) }}"
                  method="post" class="d-flex justify-content-center flex-wrap mt-3">
                @csrf
                @method('put')
                <span class="fs-3 ">Choose Category </span>
                <div class="input-group mb-3 p-5 question-text border-start-0">
                    
                    <input type="text" class="form-control col-8" name="title" placeholder=""
                           aria-label="Example text with button addon" value="{{$category->title}}" aria-describedby="button-addon1" REQUIRED>
                    <button class="btn btn-secondary col-4" type="submit" id="button-addon1">Change</button>
                </div>
                <a href="{{route('admin.podcasts.category')}}">Back</a>
        </div>



    </div>


@endsection




