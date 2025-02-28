@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid position-relative">

        <!-- category form -->
        <div class="col-12 col-lg-9 float-start pe-5 ps-5 " dir="ltr">
            {{--page title --}}
            <nav aria-label="breadcrumb" class="d-flex flex-row-reverse mt-3 fs-3 fw-bold" dir="ltr">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">دسته‌بندی پاسخ به سوالات</li>
                </ol>
            </nav>
            @include('errors.message')
            <form action="{{ route('admin.inquiry.categories.store') }}" method="post"
                  class="d-flex justify-content-center flex-wrap mt-3">
                @csrf
                {{-- add category --}}
                <span class="fs-3 ">افزودن دسته‌بندی</span>
                <div class="input-group mb-3 p-5 question-text border-start-0">
                    <button class="btn btn-secondary col-4" type="submit" id="button-addon1">افزودن</button>
                    <input type="text" class="form-control col-8" name="title" placeholder=""
                           aria-label="Example text with button addon" aria-describedby="button-addon1" REQUIRED>
                </div>
            </form>

            <table class="table table-hover col-12 table_custom" dir="rtl">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام دسته‌بندی</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($answer_categories as $answer_category)
                    <tr>
                        <th class="fs-4" scope="row">{{$answer_category->id}}</th>
                        <td class="fs-4 col-9">{{$answer_category->title}}</td>
                        <td>
                            <!-- to edit the category -->
                            <a href="{{route('admin.inquiry.category.edit', $answer_category->id)}}">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23.75" height="25"
                                         viewBox="0 0 23.75 25">
                                        <path id="edit-document"
                                              d="M6.5,27A2.507,2.507,0,0,1,4,24.5V4.5a2.408,2.408,0,0,1,.735-1.766A2.4,2.4,0,0,1,6.5,2h10L24,9.5v3.875L14,23.344V27Zm10,0V24.344l6.438-6.469L25.625,20.5,19.156,27Zm10.031-7.375-2.656-2.656.875-.875a1.235,1.235,0,0,1,.906-.375,1.135,1.135,0,0,1,.875.375l.875.906a1.274,1.274,0,0,1,.344.891,1.163,1.163,0,0,1-.344.859l-.875.875ZM15.25,10.75H21.5L15.25,4.5Z"
                                              transform="translate(-4 -2)" fill="#04355c"/>
                                    </svg>
                                </button>
                            </a>


                        </td>
                        <td>
                            <!-- to delete the category-->
                            <form action="{{ route('admin.inquiry.categories.delete', $answer_category->id) }}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button class="btn" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                        <path fill="#04355c"
                                              d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>


        </div>

        {{-- edit modal --}}

    </div>


@endsection




