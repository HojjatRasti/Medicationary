@extends('layouts.admin.master')

@section('content')


    <!-- category form -->
    <div class="col-12 col-lg-9 float-start pe-5 ps-5 " dir="ltr">
        {{--page title --}}
        <nav aria-label="breadcrumb" class="d-flex flex-row-reverse mt-3 fs-3 fw-bold" dir="ltr">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">دسته‌بندی وبینارها</li>
            </ol>
        </nav>
        @include('errors.message')
        <form action="{{ route('admin.webinar.categories.store') }}" method="post"
              class="d-flex justify-content-center flex-wrap mt-5">
            @csrf
            {{-- add category --}}
            <span class="fs-3 ">افزودن دسته‌بندی</span>
            <div class="input-group mb-3 p-5 question-text">
                <button class="btn btn-secondary col-4" type="submit" id="button-addon1">افزودن</button>
                <input type="text" class="form-control col-8" name="title" placeholder=""
                       aria-label="Example text with button addon" aria-describedby="button-addon1" REQUIRED>
            </div>
        </form>


        <form action="{{ route('admin.webinar.categories.delete', $webinar_categories[0]->id ) }}" method="post"
              class="d-flex justify-content-center flex-wrap mt-5">
            @csrf
            @method('delete')
            {{-- delete category --}}
            <span class="fs-3 ">حذف دسته‌بندی</span>
            <div class="input-group mb-3 p-5">
                <button class="btn btn-secondary col-4" type="button" id="button-addon1">حذف</button>
                <select class="form-select text-center" id="inputGroupSelect01" name="category_id_delete" dir="rtl">
                    @foreach($webinar_categories as $webinar_category)
                    <option selected>یک دسته بندی را انتخاب کنید</option>
                    <option value="{{$webinar_category->id}}">{{$webinar_category->title}}</option>
                    @endforeach
                </select>
            </div>
        </form>

        <form action="{{ route('admin.webinar.categories.edit', $webinar_categories[0]->id) }}" method="post"
              class="d-flex justify-content-center flex-wrap mt-5">
            <div class="answer-text col-12 text-center">
                <span class="fs-3 mt-2 ">تغییر دسته‌بندی</span>
                <div class="input-group mb-3 p-5 ">
                    <button class="btn btn-secondary col-4" type="button" id="button-addon1">تغییر</button>
                    <input type="text" class="form-control" placeholder="" aria-label="Username">
                    <span class="input-group-text ">
                    <svg style="rotate: -90deg; xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path
                            fill="#848a8b" d="M16 13v8H8v-8H2L12 3l10 10zm-9-2h3v8h4v-8h3l-5-5z" stroke-width="0.5"
                            stroke="#848a8b"/>
                        </svg>
                </span>
                    <select class="form-select text-center" id="inputGroupSelect01" name="category_id_edit" dir="rtl">
                        @foreach($webinar_categories as $webinar_category)
                        <option selected>یک دسته بندی را انتخاب کنید</option>
                            <option value="{{$webinar_category->id}}">{{$webinar_category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

    </div>


@endsection




