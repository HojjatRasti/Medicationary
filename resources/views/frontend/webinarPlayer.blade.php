@extends('layouts.frontend.master')

@section('title')
    <title>پلیر مدیکشنری</title>
@endsection

@section('content')

<div class="container">
    <div id="webinarPlayer" class="mt-2 object-fit-fill">
        <video src="/{{$webinar->webinar_url}}" controls class="w-100"></video>
    </div>

</div>

@endsection
