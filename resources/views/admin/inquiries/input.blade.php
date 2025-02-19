@extends('layouts.admin.master')

@section('content')

<div class="container-fluid position-relative">

    <div class="main-list col-12 col-lg-9 float-start pe-5 ps-5">
        {{--page title --}}
        <nav aria-label="breadcrumb" class="d-flex flex-row-reverse mt-3 fs-3 fw-bold" dir="ltr">
            <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">لیست پرسش های دریافتی</li>
            </ol>
        </nav>


        <div class="list-page-titles d-flex justify-content-start p-3 text-center">

            <div class="h4 col-1">#</div>
            <div class="h4 col-2">تاریخ ایجاد</div>
            <div class="h4 col-6 text-center">عنوان پرسش</div>
            <div class="h4 col-2">وضیعت پاسخ</div>

        </div>

        @foreach($questions as $question)
        <div class="list-page-items d-flex justify-content-start align-items-center mt-3 p-4 text-center">
            <div class="display-4 col-1">{{$question->id}}</div>
            <div class="display-4 col-2">{{$question->created_at->jdate('j F Y')}}</div>
{{--
            <div class="display-4 col-8 overflow-hidden p-0">
--}}
            <div id="admin-ask-title" class="display-4 col-6 overflow-hidden">
                {{$question->title}}
            </div>

            <div class="col-2" >
                <button type="button" class="statusToggle {{ $question->toggle_status ? 'btn btn-primary' : '' }}" questionId="{{$question->id}}">پاسخ داده شد</button>
            </div>


            <div class="list-icons d-flex justify-content-around col-1 pe-4 ps-4" title="جواب دادن به پرسش">
                <a href="{{ route('admin.inquiries.answer', $question->id)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                        <g transform="translate(24 0) scale(-1 1)">
                            <path fill="#04355c"
                                  d="m18 21l-1.4-1.4l1.575-1.6H14v-2h4.175L16.6 14.4L18 13l4 4l-4 4ZM7 10h8V8H7v2Zm0 4h5v-2H7v2Zm-4 7V6q0-.825.588-1.413T5 4h12q.825 0 1.413.588T19 6v5.075q-.25-.05-.5-.063T18 11q-2.525 0-4.263 1.75T12 17q0 .25.013.5t.062.5H6l-3 3Z"/>
                        </g>
                    </svg>
                </a>
            </div>

        </div>
        @endforeach
        {{--        pagination--}}
        {{$questions->links()}}
    </div>
</div>

<script>

$(document).ready(function(){
    $('.statusToggle').click(function (){
        const btn = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{route('admin.inquiries.toggleStatus')}}',
            method: 'GET',
            data: {status:btn.attr('questionId')},
            success: function(response) {
                if(response == 1){
                    btn.toggleClass('btn btn-primary')
                }
            },
        });
    });
})

</script>

@endsection
