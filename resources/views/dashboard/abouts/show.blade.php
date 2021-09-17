@extends('layouts.dashboard')
@section('content')
<h4>See Full details</h4>
<a href="{{route('dashboard.about.index')}}" class="btn btn-success btn-sm">Back</a>

<h4>{{$about->page_name}}</h4>
<span>{{$about->status}}</span>

<div>
    <img src="{{asset($about->banner)}}" width="300" height="150">
</div>


<p>{!! $about->body !!}</p>
@endsection
